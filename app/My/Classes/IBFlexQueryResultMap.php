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

/**
 * Class IBFlexQueryResultMap
 * @package App\My\Classes
 */
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
		'json'=>null,
    ];

    private $accountId;
    private $tradeLogEntityId;
    private $data;
    private $map;
	
	/**
	 * IBFlexQueryResultMap constructor.
	 */
    public function __construct(){

    }
	
	/**
	 * @param $row
	 *
	 * @return bool
	 */
    private function isHeader($row){
        if ($row['clientaccountid']!='ClientAccountID'){
            return false;
        }else{
            return true;
        }
    }
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
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
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
    private function fixPrice($row=[]){

        $row['price'] = (isset($row['tradeprice']) && isset($row['multiplier']))? $row['tradeprice']*$row['multiplier'] : '';

        return $row['price'];
    }
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
    private function fixUnderlying($row=[]){

        $row['underlying'] = (isset($row['underlyingsymbol']) && $row['underlyingsymbol']!='')? $row['underlyingsymbol']
            : (isset($row['symbol']) ? $row['symbol'] : ''); /* UnderlyingSymbol or Symbol */

        return $row['underlying'];
    }
	
	/**
	 * @param array $row
	 *
	 * @return string
	 */
    private function fixDatetime($row=[]){

        $row['time'] = isset($row['tradedate']) && isset($row['tradetime']) ? $row['tradedate'].' '.$row['tradetime']:'';

        return $row['time'];
    }
	
	/**
	 * @param $accountId
	 *
	 * @return $this
	 */
    public function setAccountId($accountId){
        $this->accountId=$accountId;
        return $this;
    }
	
	/**
	 * @param $tradeLogEntityId
	 *
	 * @return $this
	 */
    public function setTradeLogEntityId($tradeLogEntityId){
        $this->tradeLogEntityId=$tradeLogEntityId;
        return $this;
    }
	
	/**
	 * @param $data
	 *
	 * @return $this
	 */
    public function setData($data){
        $this->data=$data;
        return $this;
    }
	
	/**
	 * @return mixed
	 */
    public function getMap(){
        return $this->map;
    }
	
	/**
	 * 
	 */
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
					$aux['json']=$row->toJson(); //save the raw json data
                    $this->map[] = $aux;
                }
            }
        }
    }
}