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

}