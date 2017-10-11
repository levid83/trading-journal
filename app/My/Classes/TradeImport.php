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
	
	const OPEN_TRADE='OPEN';
	const CLOSE_TRADE='CLOSE';
	
	const BUY='BUY';
	const SELL='SELL';
	
	const PUT='PUT';
	const CALL='CALL';
    
    private $tradeLogProvider=null;
	
	/**
	 * TradeImport constructor.
	 *
	 * @param TradeLogProvider $tradeLogProvider
	 */
    public function __construct(TradeLogProvider $tradeLogProvider){
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
	
	static private function getUnprocessedTradeLogs(){
		//those who have no trades attached and processed is 0
		return TradeLog::doesntHave('trades')
			->where('processed',0)
			//->where('open_close',TradeImport::OPEN_TRADE)
			->orderBy('time','asc')
			//->offset(0)
			//->limit(10)
			->get();
		
	}
	
	static private function getTradeOpenPair(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('status', 'OPEN')
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->first();
	}
	
	static private function isDuplicatedOpenTrade(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->where('open_date',$tradeLog->time)
			->first();
	}
	
	static private function isDuplicatedCloseTrade(TradeLog $tradeLog){
		return Trade::where('underlying',$tradeLog->underlying)
			->where('expiration',$tradeLog->last_trading_day)
			->where('strike',$tradeLog->strike)
			->where('put_call',$tradeLog->put_call)
			->where('asset_class',$tradeLog->asset_class)
			->where('close_date',$tradeLog->time)
			->first();
	}
	
	static private function processOpenTrade(TradeLog $tradeLog){
		//check for duplication
		if (!self::isDuplicatedOpenTrade($tradeLog)) {
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
			if ($tradeLog->action == TradeImport::BUY) {
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
	
	static private function processCloseTrade(TradeLog $tradeLog){
		$tradePair=self::getTradeOpenPair($tradeLog);
		if(!self::isDuplicatedCloseTrade($tradeLog) && !empty($tradePair)){//check for duplication and for open trade
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
			
			if ($tradeLog->action==TradeImport::BUY){
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
	
	static private function processUndefinedTrades(TradeLog $tradeLog){
	
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
	
	static public function processTradeLog(){
		DB::beginTransaction();

		$tradeLogs=self::getUnprocessedTradeLogs();

		if (!empty($tradeLogs)){
			foreach ($tradeLogs as $tradeLog){
				if ($tradeLog->open_close==TradeImport::CLOSE_TRADE){
					self::processCloseTrade($tradeLog);
				}
				if ($tradeLog->open_close==TradeImport::OPEN_TRADE){
					self::processOpenTrade($tradeLog);
				}
				if ($tradeLog->open_close==''){
					//self::processUndefinedTrade($tradeLog);
				}
			}
		}
		
		DB::commit();
	}
}