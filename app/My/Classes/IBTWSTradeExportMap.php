<?php

namespace App\My\Classes;

use App\My\Contracts\TradeImportMap;
use App\My\Models\Asset;
use App\My\Models\Trade;
use App\My\Models\TradingAccount;

/**
 * Class IBTWSTradeExportMap
 * @package App\My\Classes
 */
class IBTWSTradeExportMap implements TradeImportMap
{
    const MAP=[
        'account' => 				['field' =>	'account',				'validate'=> 'required|alpha_num'],
        'execution_id' => 			['field' =>	'id',					'validate'=> ''],
        'underlying' => 			['field' =>	'underlying',			'validate'=> 'required'],
        'asset_class' => 			['field' =>	'security_type',		'validate'=> 'required|alpha'],
        'expiry' => 				['field' =>	'last_trading_day',		'validate'=> 'nullable|date'],
        'strike' => 				['field' =>	'strike',				'validate'=> 'nullable|numeric'],
        'put_call' => 				['field' =>	'putcall',				'validate'=> 'nullable|alpha'],
        'currency' => 				['field' =>	'currency',				'validate'=> 'required|alpha'],
        'action' => 				['field' =>	'action',				'validate'=> 'required|alpha'],
        'quantity' => 				['field' =>	'quantity',				'validate'=> 'required|numeric'],
        'description' => 			['field' =>	'description',			'validate'=> ''],
        'financial_instrument' => 	['field' =>	'fin_instrument',		'validate'=> ''],
        'symbol' => 				['field' =>	'symbol',				'validate'=> 'required'],
        'price'=> 					['field' =>	'price',				'validate'=> 'required|numeric'],
        'time'=> 					['field' =>	'time',					'validate'=> 'required|date'], /* Time + Date*/
        'exchange' => 				['field' =>	'exch.',				'validate'=> ''],
        'comment' => 				['field' =>	'comment',				'validate'=> ''],
        'submitter' => 				['field' =>	'submitter',			'validate'=> ''],
        'commission' => 			['field' =>	'commission',			'validate'=> 'required|numeric'],
        'realized_pl' => 			['field' =>	'realized_pl',			'validate'=> ''],
        'order_id' => 				['field' =>	'order_id',				'validate'=> 'required|alpha_num'],
        'exch_exec_id' => 			['field' =>	'exch._exec._id',		'validate'=> ''],
        'exch_order_id' => 			['field' =>	'exch._order_id',		'validate'=> ''],
        'trading_class' => 			['field' =>	'trading_class',		'validate'=> ''],
        'price_incl_fees' => 		['field' =>	'price_incl._fees',		'validate'=> ''],
        'open_close' => 			['field' =>	'openclose',			'validate'=> ''],
    ];

    private $data;
    private $map;
	
	/**
	 * @param array $row
	 *
	 * @return bool
	 */
    public function isCombo($row=[]){
        if (isset($row['comb.']) && $row['comb.']!=''){
            return true;
        }else{
            return false;
        }
    }
	
	public function fixOpenClose($row=[]){
    	if (isset($row['openclose'])) {
			$str = strtoupper(trim($row['openclose']));
			if ($str && $str[0] == 'C') {
				return Trade::CLOSE_TRADE;
			} elseif ($str && $str[0] == 'O') {
				return Trade::OPEN_TRADE;
			} else {
				return '';
			}
		}else{
    		return '';
		}
	}
	
	public function fixAction($row=[]){
		if (isset($row['action'])) {
			$str = strtoupper(trim($row['action']));
			if ($str && $str[0] == 'B') {
				return Trade::BUY;
			}
			if ($str && $str[0] == 'S') {
				return Trade::SELL;
			}
			
			return '';
		}else{
			return '';
		}
		
	}
	public function fixPutCall($row=[]){
		if (isset($row['putcall'])) {
			$str = strtoupper(trim($row['putcall']));
			if ($str && $str[0] == 'P') {
				return Trade::PUT;
			} elseif ($str && $str[0] == 'C') {
				return Trade::CALL;
			} else {
				return null;
			}
		}else{
			return null;
		}
		
	}
 
	/**
	 * @param array $row
	 *
	 * @return array
	 */
    public function fixPriceAndStrikePrice($row=[]){

        if (in_array($row['security_type'], ['FOP','FUT'])) {
            $asset = Asset::where('symbol', $row['underlying'])->first();
            if ($asset) {
                if ($pos_slash=strpos($row['price'],'/')){ // fix 1/8 , 1/32 and 1/64 type numbers
                    if ($pos_space=strpos($row['price'],' ')){
                        $row['price']=intval(substr($row['price'],0,$pos_space))
                            +intval(substr($row['price'],$pos_space+1,$pos_slash-$pos_space-1))/intval(substr($row['price'],$pos_slash+1));
                    }else{
                        $row['price']=intval(substr($row['price'],0,$pos_slash))/intval(substr($row['price'],$pos_slash+1));
                    }
                }
                if ($asset->price_correction!=1){ //ZB, ZC , ZW ...
                    $row['strike'] = isset($row['strike']) ? $row['strike']*$asset->price_correction:'';
                }
                $row['price'] = isset($row['price']) ? $row['price']* $asset->multiplier:''; // Futures and FOPs
            }else{
                $row['price'] = isset($row['price']) ? $row['price']:'';
            }
        } else {
            $row['price'] = isset($row['price']) ? $row['price'] * 100 : ''; // default, stock OPT etc
        }

        return [$row['price'],$row['strike']];
    }
	
	/**
	 * @param array $row
	 *
	 * @return string
	 */
    public function fixDatetime($row=[]){

        $row['time'] = isset($row['date']) ? substr($row['date'], 0, 4) . '-' . substr($row['date'], 4, 2) . '-'
            . substr($row['date'], 6, 2) . ' ' . (isset($row['time']) ? $row['time'] : '00:00:00') : '0000-00-00 00:00:00';

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
	 * @param array $params
	 */
    public function map(Array $params=array()){
        $this->map=[];
        if (!empty($this->data)){
            foreach ($this->data as $row) {
                if(!$this->isCombo($row)){
                    $aux = [];
					foreach (self::MAP as $key => $item) {
						if (isset($row[$item['field']])) {
							$aux[$key] = $row[$item['field']];
						}
					}
                    
                    $aux['open_close']=$this->fixOpenClose($row);
					$aux['action']=$this->fixAction($row);
					$aux['put_call']=$this->fixPutCall($row);
                    list($aux['price'], $aux['strike']) = $this->fixPriceAndStrikePrice($row);
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