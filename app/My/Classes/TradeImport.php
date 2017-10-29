<?php

/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 8:27 AM
 */

namespace App\My\Classes;

use DB;
use App\My\Models\TradeLog;
use App\My\Models\Trade;
use App\My\Contracts\TradeLogProvider;
use Illuminate\Support\Facades\Auth;


class TradeImport
{
    const PROTOCOLS=['file'=>'file','api'=>'api'];
    const INTERACTIVE_BROKERS=1;
    const AMERITRADE=2;
    const BROKER_DIRECTORIES=[1=>'InteractiveBrokers/',2=>'Ameritrade/'];
	
	private $tradeLogProvider=null;
	
	/**
	 * TradeImport constructor.
	 *
	 * @param TradeLogProvider $tradeLogProvider
	 */
    public function __construct(TradeLogProvider $tradeLogProvider=null){
        $this->tradeLogProvider=$tradeLogProvider;
    }

    /**
     * @param array $data
     */
    private function saveTradeLogs($data=[]){
        if (!empty($data)) {
            $new_values=[];
            foreach ($data as $key => $row) {
                $duplication = TradeLog::where('order_id', $row['order_id'])->get();
                if ($duplication->count() > 0) {
                    TradeLog::where('order_id', $row['order_id'])->where('client_id', $row['client_id'])->update($row);
                } else {
					$tradeLog=new TradeLog($row);
                	if(Auth::user()->can('import',$tradeLog)){
						$tradeLog->save();
					}
                }
            }
        }
    }
	
	private function getUnprocessedTradeLogs(){
		//those who have no trades attached and processed is 0
		return TradeLog::doesntHave('trades')
			->where('processed',0)
			->orderBy('time','asc')
			->get();
	}
	
	/*
	 * checks for open trade in the trades table
	 */
	private function getOpenTrade(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('status', 'OPEN')
			->where('expiration',$tradeLog->expiry)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->where('client_id',$tradeLog->client_id)
			->where('action','<>',$tradeLog->action)
			->first();
	}
	
	

	private function processOpenTrade(TradeLog $tradeLog){
		$record = ['trader_id'       => $tradeLog->trader_id,
				   'client_id'       => $tradeLog->client_id,
				   'underlying'      => $tradeLog->underlying,
				   'status'          => 'OPEN',
				   'action'          => $tradeLog->action,
				   'quantity'        => $tradeLog->quantity,
				   'asset_class'     => $tradeLog->asset_class,
				   'expiration'      => $tradeLog->expiry,
				   'strike'          => $tradeLog->strike,
				   'put_call'        => $tradeLog->put_call,
				   'currency'        => $tradeLog->currency,
				   'commission_open' => $tradeLog->commission,/* close comission */
				   'profit'          => $tradeLog->realized_pl,
				   'description'     => $tradeLog->description,
				   'open_date'       => $tradeLog->time,
				   'exchange'        => $tradeLog->exchange,
				   'trading_class'   => $tradeLog->trading_class,
		];
		if ($tradeLog->action == Trade::BUY) {
			$record['ask'] = $tradeLog->price;
		} else {
			$record['bid'] = $tradeLog->price;
		}
		
		$trade = Trade::create($record);
		
		$tradeLog->trades()->attach($trade->id);

	}
	
	private function calculateProfit($quantity, $ask,$bid,$com1,$com2){
		return $quantity*($bid-$ask)-$com1-$com2;
	}
	
	
	
	private function handleOpenTradeHasFewerQuantities(TradeLog $tradeLog, Trade $openTrade){
		
		$quantity=$openTrade->quantity;
		$quantity_left=$tradeLog->quantity-$openTrade->quantity;
		
		$commission_unit=$tradeLog->commission/$tradeLog->quantity;
		$commission=$commission_unit*$quantity;
		
		$record=[ 'status' => 		'CLOSED',
				  'quantity' => 	$quantity,
				  'commission_close'=>$commission,
				  'description' => 	$tradeLog->description,
				  'close_date'=>	$tradeLog->time,
		];
		
		if ($tradeLog->action==Trade::BUY){
			$record['ask']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$tradeLog->price, $openTrade->bid, $openTrade->commission_open, $commission);
		}else{
			$record['bid']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$openTrade->ask, $tradeLog->price, $openTrade->commission_open, $commission);
		}
		
		Trade::where('id',$openTrade->id)->update($record);
		
		$tradeLog->trades()->attach($openTrade->id);
		
		$tradeLog->quantity=$quantity_left;
		$tradeLog->commission=$commission_unit*$quantity_left;
		
		$this->processTrade($tradeLog); //process the quantity left
	}
	
	private function handleOpenTradeHasMoreQuantities(TradeLog $tradeLog, Trade $openTrade){
		
		
		$quantity=$tradeLog->quantity;
		$quantity_left=$openTrade->quantity-$quantity;
		
		$commission_unit=$openTrade->commission_open/$openTrade->quantity;
		$commission_open=$commission_unit*$quantity;
		$commission=$tradeLog->commission;
		$commission_left=$commission_unit*$quantity_left;
		
		
		$record=[ 'status' => 		'CLOSED',
				  'quantity' => 	$quantity,
				  'commission_close'=>$commission,
				  'description' => 	$tradeLog->description,
				  'close_date'=>	$tradeLog->time,
		];
		
		if ($tradeLog->action== Trade::BUY){
			$record['ask']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$tradeLog->price, $openTrade->bid, $commission_open, $commission);
		}else{
			$record['bid']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$openTrade->ask, $tradeLog->price, $commission_open, $commission);
		}
		
		$newTrade=$openTrade->replicate();
		$newTrade->quantity=$quantity_left;
		$newTrade->commission_open=$commission_left;
		$newTrade->save();
		
		Trade::where('id',$openTrade->id)->update($record);
		
		$tradeLog->trades()->attach([$openTrade->id,$newTrade->id]);
	}

	private function handleOpenTradeHasEqualQuantities(TradeLog $tradeLog, Trade $openTrade){
		
		$commission=$tradeLog->commission;
		$quantity=$tradeLog->quantity;
		
		$record=[ 'status' => 		'CLOSED',
				  'quantity' => 	$quantity,
				  'commission_close'=>$commission,
				  'description' => 	$tradeLog->description,
				  'close_date'=>	$tradeLog->time,
		];
		
		if ($tradeLog->action== Trade::BUY){
			$record['ask']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$tradeLog->price, $openTrade->bid, $openTrade->commission_open, $commission);
		}else{
			$record['bid']=$tradeLog->price;
			$record['profit']=$this->calculateProfit($quantity,$openTrade->ask, $tradeLog->price, $openTrade->commission_open, $commission);
		}
		
		Trade::where('id',$openTrade->id)->update($record);
		
		$tradeLog->trades()->attach($openTrade->id);
	}
	
	private function processTrade(TradeLog $tradeLog){
		
		$openTrade=$this->getOpenTrade($tradeLog);
		
		$tradeLog->quantity=abs($tradeLog->quantity);
		$tradeLog->price=abs($tradeLog->price);
		$tradeLog->commission=abs($tradeLog->commission);
		
		if(!empty($openTrade)) {
			
			if($openTrade->quantity<$tradeLog->quantity){
				
				$this->handleOpenTradeHasFewerQuantities($tradeLog,$openTrade);
				
			}elseif($openTrade->quantity>$tradeLog->quantity) {
				
				$this->handleOpenTradeHasMoreQuantities($tradeLog,$openTrade);
				
			}else{
				
				$this->handleOpenTradeHasEqualQuantities($tradeLog, $openTrade);
				
			}
		}else{
			$this->processOpenTrade($tradeLog);
		}
	}
	
	/**
	 *
	 */
    public function importTradeLogs(){
        DB::beginTransaction();
        $this->tradeLogProvider->buildTradeLogs();
        $trade_logs=$this->tradeLogProvider->getTradeLogs();
        $this->saveTradeLogs($trade_logs);
        DB::commit();
    }
	
	public function processTradeLog(){
		DB::beginTransaction();
		$tradeLogs=$this->getUnprocessedTradeLogs();
		if (!empty($tradeLogs)) {
			foreach ($tradeLogs as $tradeLog) {
				$this->processTrade($tradeLog);

				TradeLog::where('id',$tradeLog->id)->update(['processed'=>true]);
			}
		}
		
		DB::commit();
	}
}