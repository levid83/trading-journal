<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 11:25 AM
 */

namespace App\My\Classes;


use App\My\Contracts\TradeImportMap;
use App\My\Exceptions\TradeImportException;
use App\My\Models\Asset;
use App\My\Models\Trade;
use App\My\Models\TradingAccount;
use Validator;

/**
 * Class IBFlexQueryResultMap
 * @package App\My\Classes
 */
class IBFlexQueryResultMap implements TradeImportMap
{

    const MAP=[
        'account' => 				['field'=>'clientaccountid', 	'validate'=>'required|alpha_num'],
        'execution_id' => 			['field'=>'ibexecid',			'validate'=>''],
        'underlying' => 			['field'=>'underlyingsymbol',	'validate'=>'required'],
        'asset_class' => 			['field'=>'assetclass',			'validate'=>'required|alpha'],
        'expiry' => 				['field'=>'expiry',				'validate'=>'nullable|date'],
        'strike' => 				['field'=>'strike',				'validate'=>'nullable|numeric'],
        'put_call' => 				['field'=>'putcall',			'validate'=>'nullable|alpha'],
        'currency' => 				['field'=>'currencyprimary',	'validate'=>'required|alpha'],
        'action' => 				['field'=>'buysell',			'validate'=>'required|alpha'],
        'quantity' => 				['field'=>'quantity',			'validate'=>'required|numeric'],
        'description' => 			['field'=>'description',		'validate'=>''],
        'financial_instrument' => 	['field'=>'description',		'validate'=>''],
        'symbol' => 				['field'=>'symbol',				'validate'=>'required'],
        'price'=> 					['field'=>'tradeprice',			'validate'=>'required|numeric'],
        'time'=> 					['field'=>'tradetime',			'validate'=>'required|date'],/* Time + Date*/
        'exchange' => 				['field'=>'exchange',			'validate'=>''],
        'commission' => 			['field'=>'ibcommission',		'validate'=>'required|numeric'],
        'order_id' => 				['field'=>'iborderid',			'validate'=>'required|alpha_num'],
        'exch_exec_id' => 			['field'=>'extexecid',			'validate'=>''],
        'exch_order_id' => 			['field'=>'exchorderid',		'validate'=>''],
        'open_close' => 			['field'=>'opencloseindicator',	'validate'=>''],
        'costbasis' => 				['field'=>'costbasis',			'validate'=>'numeric'],
        'conid' => 					['field'=>'conid',				'validate'=>'required|alpha_num'],
        'order_time' => 			['field'=>'ordertime',			'validate'=>''],
        'order_type' => 			['field'=>'ordertype',			'validate'=>'']
    ];
	
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
    public function isDataRow($row){
        if ($row['header']=='DATA'){
            return true;
        }else{
            return false;
        }
    }
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
	public function fixUnderlyingSymbol($row=[]){
		
		if (in_array($row['assetclass'], ['FOP'])) {
			$row['underlyingsymbol'] = str_before($row['description'],' ');
		}

		return $row['underlyingsymbol'];
	}
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
	public function fixUnderlying($row=[]){
		
		$row['underlying'] = (isset($row['underlyingsymbol']) && $row['underlyingsymbol']!='')? $row['underlyingsymbol']
			: (isset($row['symbol']) ? $row['symbol'] : ''); /* UnderlyingSymbol or Symbol */
		return $row['underlying'];
	}
 
	public function fixOpenClose($row=[]){
		if (isset($row['opencloseindicator'])) {
			$str=strtoupper(trim($row['opencloseindicator']));
			if ($str && $str[0]=='C'){
				return Trade::CLOSE_TRADE;
			}elseif($str && $str[0]=='O'){
				return Trade::OPEN_TRADE;
			}else{
				return '';
			}
		}else{
			return '';
		}
	}
	
	public function fixAction($row=[]){
		if (isset($row['buysell'])) {
			$str=strtoupper(trim($row['buysell']));
			if ($str && $str[0]=='B'){
				return Trade::BUY;
			}
			if ($str && $str[0]=='S'){
				return Trade::SELL;
			}
		}
	}
	public function fixPutCall($row=[]){
		if (!is_null($row['putcall'])) {
			$str = strtoupper(trim($row['putcall']));
			if ($str && $str[0] == 'P') {
				return Trade::PUT;
			} elseif ($str && $str[0] == 'C') {
				return Trade::CALL;
			}
		}
	}
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
    public function fixStrikePrice($row=[]){

        if (in_array($row['assetclass'], ['FOP'])) {
            $asset = Asset::where('aliases', 'like', '%'.$row['underlying'].'%')->first();
            if ($asset) {
                if ($asset->price_correction!=1){
                    $row['strike'] = isset($row['strike']) ? $row['strike']*$asset->price_correction:null;
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
    public function fixPrice($row=[]){

        $row['price'] = (isset($row['tradeprice']) && isset($row['multiplier']))? $row['tradeprice']*$row['multiplier'] : null;
		
        return $row['price'];
    }
	
	/**
	 * @param array $row
	 *
	 * @return string
	 */
    public function fixDatetime($row=[]){

        $row['time'] = isset($row['tradedate']) && isset($row['tradetime']) ? $row['tradedate'].' '.$row['tradetime']:null;
        return $row['time'];
    }
	
    public function validate($aux){
    
		$map=collect(self::MAP)->mapWithKeys(function($item,$idx){
			return [$idx=>$item['validate']];
		});
		$validator =Validator::make($aux,$map->toArray());
		$validator->sometimes(['expiry','strike'], 'required', function($data){
			return in_array($data->asset_class,['OPT','FOP']);
		});
		
		if ($validator->fails()){
			$error_message=implode(' ',$validator->errors()->all());
			throw new TradeImportException('Data validation failed at '.$aux['description'].' '.$error_message);
		}
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
	 * 
	 */
    public function map(){
        $this->map=array();
        if (!empty($this->data)) {
            foreach ($this->data as $row) {
                if($this->isDataRow($row)) {
                    $aux = [];
					
                    foreach (self::MAP as $key => $item) {
                        if (isset($row[$item['field']])) {
                            $aux[$key] = $row[$item['field']];
                        }
                    }
					//!!! fix the $row not $aux
					$row['underlyingsymbol'] = $this->fixUnderlyingSymbol($row);
					
					$aux['underlying'] = $this->fixUnderlying($row);
					$aux['open_close']=$this->fixOpenClose($row);
					$aux['action']=$this->fixAction($row);
					$aux['put_call']=$this->fixPutCall($row);
                    $aux['strike'] = $this->fixStrikePrice($row);
                    $aux['price'] = $this->fixPrice($row);
                    $aux['time'] = $this->fixDateTime($row);
					
					$aux['json']=$row->toJson(); //save the raw json data
					
					$this->validate($aux);
	
                    $this->map[] = $aux;
                }
            }
        }
		return $this->map;
    }
}