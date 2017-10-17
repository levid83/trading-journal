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
                $duplication = TradeLog::where('execution_id', $row['execution_id'])->get();
                if ($duplication->count() > 0) {
                    TradeLog::where('execution_id', $row['execution_id'])->update($row);
                } else {
                    TradeLog::insert($row);
                }
            }
        }
    }
	
	private function getUnprocessedTradeLogs(){
		//those who have no trades attached and processed is 0
		return TradeLog::doesntHave('trades')
			->where('processed',0)
			//->where('open_close',TradeImport::OPEN_TRADE)
			->orderBy('time','asc')
			//->offset(0)
			//->limit(10)
			->get();
		
	}
	
	private function getTradeOpenPair(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('status', 'OPEN')
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->first();
	}
	
	private function isDuplicatedOpenTrade(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->where('open_date',$tradeLog->time)
			->first();
	}
	
	private function isDuplicatedCloseTrade(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->where('close_date',$tradeLog->time)
			->first();
	}
	
	private function processOpenTrade(TradeLog $tradeLog){
		//check for duplication
		if (!$this->isDuplicatedOpenTrade($tradeLog)) {
			$record = ['trader_id'       => $tradeLog->trading_account_id,
					   'client_id'       => $tradeLog->client_id,
					   'underlying'      => $tradeLog->underlying,
					   'status'          => 'OPEN',
					   'action'          => $tradeLog->action,
					   'quantity'        => abs($tradeLog->quantity),
					   'asset_class'     => $tradeLog->asset_class,
					   'expiration'      => $tradeLog->last_trading_day,
					   'strike'          => $tradeLog->strike,
					   'put_call'        => $tradeLog->put_call,
					   'currency'        => $tradeLog->currency,
					   'commission_open' => abs($tradeLog->commission),/* close comission */
					   'profit'          => $tradeLog->realized_pl,
					   'description'     => $tradeLog->description,
					   'open_date'       => $tradeLog->time,
					   'exchange'        => $tradeLog->exchange,
					   'trading_class'   => $tradeLog->trading_class,
			];
			if ($tradeLog->action == Trade::BUY) {
				$record['ask'] = abs($tradeLog->price);
			} else {
				$record['bid'] = abs($tradeLog->price);
			}
			
			$trade = Trade::create($record);
			$tradeLog->trades()->attach($trade->id);
			$tradeLog->processed = true;
			$tradeLog->save();
		}
	}
	
	private function processCloseTrade(TradeLog $tradeLog){
		$tradePair=$this->getTradeOpenPair($tradeLog);
		if(!$this->isDuplicatedCloseTrade($tradeLog) && !empty($tradePair)){//check for duplication and for open trade
			$record=[ 'trader_id' =>	$tradeLog->trading_account_id,
					  'client_id'=>		$tradeLog->client_id,
					  'underlying'=>	$tradeLog->underlying,
					  'status' => 		'CLOSED',
					  'action' => 		$tradeLog->action,
					  'quantity' => 	abs($tradeLog->quantity),
					  'asset_class' =>	$tradeLog->asset_class,
					  'expiration' => 	$tradeLog->last_trading_day,
					  'strike' => 		$tradeLog->strike,
					  'put_call' => 	$tradeLog->put_call,
					  'currency' =>		$tradeLog->currency,
					  'commission_close'=>abs($tradeLog->commission),/* close comission */
					  'profit'=>		$tradeLog->realized_pl,
					  'description' => 	$tradeLog->description,
					  'close_date'=>	$tradeLog->time,
					  'exchange'=>		$tradeLog->exchange,
					  'trading_class' =>$tradeLog->trading_class,
			];
			
			if ($tradeLog->action== Trade::BUY){
				$record['ask']=abs($tradeLog->price);
			}else{
				$record['bid']=abs($tradeLog->price);
			}
			
			Trade::where('id',$tradePair->id)->update($record);
			
			$tradeLog->trades()->attach($tradePair->id);
			$tradeLog->processed=true;
			$tradeLog->save();
			
		}
	}
	
	private function processUndefinedTrades(TradeLog $tradeLog){
	
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

		if (!empty($tradeLogs)){
			foreach ($tradeLogs as $tradeLog){
				if ($tradeLog->open_close== Trade::CLOSE_TRADE){
					$this->processCloseTrade($tradeLog);
				}
				if ($tradeLog->open_close== Trade::OPEN_TRADE){
					$this->processOpenTrade($tradeLog);
				}
				if ($tradeLog->open_close==''){
					//$this->processUndefinedTrade($tradeLog);
				}
			}
		}
		
		DB::commit();
	}
}