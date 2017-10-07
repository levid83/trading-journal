<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 11:25 AM
 */

namespace App\My\Classes;


use App\My\Contracts\TradeImportMap;
use App\My\Models\Asset;


class IBFlexQueryResultMap implements TradeImportMap
{

    const MAP=[
        'trading_account_id' => null,
        'trade_log_file_id' =>null,
        'account' => 'clientaccountid',/* ClientAccountID */
        'execution_id' => 'ibexecid',/* IBExecID - IB unique execution id */
        'underlying' => 'underlyingsymbol', /* UnderlyingSymbol */
        'asset_class' => 'assetclass', /* AssetClass */
        'expiry' => 'expiry', /* Expiry */
        'strike' => 'strike',/* Strike */
        'put_call' => 'putcall',/* Put/Call */
        'currency' => 'currencyprimary',/* CurrencyPrimary */
        'action' => 'buysell',/* Buy/sell */
        'quantity' => 'quantity',/* Quantity */
        'description' => 'description',/* Description */
        'financial_instrument' => 'description',/* Description */
        'symbol' => 'symbol',/* Symbol */
        'price'=> 'price', /* Price */
        'time'=> 'tradetime', /* TradeTime + TradeDate*/
        'exchange' => 'exchange',/* Exchange */
        'commission' => 'ibcommission',/* IBCommission */
        'order_id' => 'iborderid',/* IBOrderID */
        'exch_exec_id' => 'extexecid',/* ExtExecID */
        'exch_order_id' => 'exchorderid',/* ExchOrderID */
        'open_close' => 'opencloseindicator',/* Open/Close  */
        'costbasis' => 'costbasis',/* CostBasis */
        'conid' => 'conid',/* Conid  */
        'order_time' => 'ordertime',/* OrderTime  */
        'order_type' => 'ordertype',/* OrderType  */
    ];

    private $accountId;
    private $tradeLogEntityId;
    private $data;
    private $map;

    public function __construct(){

    }

    private function isHeader($row){
        if ($row['clientaccountid']!='ClientAccountID'){
            return false;
        }else{
            return true;
        }
    }

    private function fixStrikePrice($row=[]){

        if (in_array($row['assetclass'], ['FOP'])) {
            $asset = Asset::where('symbol', $row['underlying'])->first();
            if ($asset) {
                if ($asset->price_correction!=1){
                    $row['strike'] = isset($row['strike']) ? $row['strike']*$asset->price_correction:'';
                }
            }
        }
        return $row['strike'];
    }

    private function fixPrice($row=[]){

        $row['price'] = (isset($row['tradeprice']) && isset($row['multiplier']))? $row['tradeprice']*$row['multiplier'] : '';

        return $row['price'];
    }

    private function fixUnderlying($row=[]){

        $row['underlying'] = (isset($row['underlyingsymbol']) && $row['underlyingsymbol']!='')? $row['underlyingsymbol']
            : (isset($row['symbol']) ? $row['symbol'] : ''); /* UnderlyingSymbol or Symbol */

        return $row['underlying'];
    }

    private function fixDatetime($row=[]){

        $row['time'] = isset($row['tradedate']) && isset($row['tradetime']) ? $row['tradedate'].' '.$row['tradetime']:'';

        return $row['time'];
    }

    public function setAccountId($accountId){
        $this->accountId=$accountId;
        return $this;
    }

    public function setTradeLogEntityId($tradeLogEntityId){
        $this->tradeLogEntityId=$tradeLogEntityId;
        return $this;
    }
    public function setData($data){
        $this->data=$data;
        return $this;
    }

    public function getMap(){
        return $this->map;
    }

    public function map(){
        $this->map=array();
        if (!empty($this->data)) {
            foreach ($this->data as $row) {
                if(!$this->isHeader($row)) {
                    $aux = [];
                    foreach (self::MAP as $key => $item) {
                        if (isset($row[$item])) {
                            $aux[$key] = $row[$item];
                        }
                    }

                    $aux['trading_account_id'] = $this->accountId;
                    $aux['trade_log_file_id'] = $this->tradeLogEntityId;
                    $aux['strike'] = $this->fixStrikePrice($row);
                    $aux['price'] = $this->fixPrice($row);
                    $aux['time'] = $this->fixDateTime($row);
                    $aux['underlying'] = $this->fixUnderlying($row);

                    $this->map[] = $aux;
                }
            }
        }
    }
}