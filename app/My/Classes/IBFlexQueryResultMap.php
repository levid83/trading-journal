<?php
namespace App\My\Classes;

use App\My\Contracts\TradeImportMap;
use App\My\Exceptions\TradeImportException;
use App\My\Models\Asset;
use App\My\Models\Trade;
use App\My\Models\TradingAccount;
use App\My\Repositories\Contracts\TradeRepositoryInterface;
use Illuminate\Support\Collection;
use Mockery\Exception;
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
    
    private $tradeRepo;
	
    private $assets;
    
	/**
	 * IBFlexQueryResultMap constructor.
	 */
    public function __construct(TradeRepositoryInterface $tradeRepo){
		$this->tradeRepo=$tradeRepo;
		$this->assets=collect($this->tradeRepo->assets()->toArray());
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
			$row['underlyingsymbol'] = str_before($row['description']," ");
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
				return $this->tradeRepo::CLOSE_TRADE;
			}elseif($str && $str[0]=='O'){
				return $this->tradeRepo::OPEN_TRADE;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	public function fixAction($row=[]){
		if (isset($row['buysell'])) {
			$str=strtoupper(trim($row['buysell']));
			if ($str && $str[0]=='B'){
				return $this->tradeRepo::BUY;
			}
			if ($str && $str[0]=='S'){
				return $this->tradeRepo::SELL;
			}
		}
	}
	public function fixPutCall($row=[]){
		if (isset($row['putcall'])) {
			$str = strtoupper(trim($row['putcall']));
			if ($str && $str[0] == 'P') {
				return $this->tradeRepo::PUT;
			} elseif ($str && $str[0] == 'C') {
				return $this->tradeRepo::CALL;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	/**
	 * @param array $row
	 *
	 * @return mixed|string
	 */
    public function fixStrikePrice($row=[]){

    	if (!isset($row['strike']) || $row['strike']=='') return null;
    	
        if (in_array($row['assetclass'], ['FOP'])) {
        	$asset=$this->assets->first(function($value,$key) use ($row){
        		return in_array($row['underlying'],explode(',',$value['aliases']));
			});
				
            if ($asset) {
                if ($asset['price_correction']!=1){
                    $row['strike'] = isset($row['strike']) ? $row['strike']*$asset['price_correction']:null;
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
	 * @return null|string
	 */
    public function fixDatetime($row=[]) {
	
		if (!isset($row['tradedate']) || $row['tradedate']=='') return null;
		if (!isset($row['tradetime']) || $row['tradetime']=='') return null;
    	
        $row['time'] = $row['tradedate'].' '.$row['tradetime'];
        return $row['time'];
    }
	
	/**
	 * @param Collection $dataCollection
	 *
	 * @return Collection
	 */
    public function removeHeaders(Collection $dataCollection) : Collection{
    	return $dataCollection->filter(function($values){
			return $values['header']=='DATA';
		});
	}
	
	/**
	 * @param Collection $dataCollection
	 *
	 * @return Collection
	 */
	public function transformData(Collection $dataCollection): Collection{
		
		$transformationMap=collect(self::MAP);
  
		return $dataCollection->map(function($row) use($transformationMap){
			
			$new_values = $transformationMap->map(function ($item, $idx) use ($row) {
				return isset($row[ $item['field'] ]) ? $row[ $item['field']] : null;
			});
			
			$row['underlyingsymbol'] = $this->fixUnderlyingSymbol($row);//!!! fix the $row not $new_values
			$new_values['underlying'] = $this->fixUnderlying($row);
			
			$row['underlying']=$new_values['underlying']; //needed at fixStrikePrice
			
			$new_values['open_close'] = $this->fixOpenClose($row);
			$new_values['action'] = $this->fixAction($row);
			$new_values['put_call'] = $this->fixPutCall($row);
			
			$new_values['strike'] = $this->fixStrikePrice($row);
			
			$new_values['price'] = $this->fixPrice($row);
			$new_values['time'] = $this->fixDateTime($row);
			$new_values['json'] = json_encode($row); //save the raw json data
			
			return $new_values;
		});
	}
	
	/**
	 * @return array
	 */
	public function getValidationRules(): array {
		return collect(self::MAP)->mapWithKeys(function ($item, $idx) {
			return [$idx => $item['validate']];
		})->toArray();
	}
	
	/**
	 * @param Collection $dataCollection
	 * @param array      $validationRules
	 *
	 * @return bool
	 */
    public function validateMap(Collection $dataCollection,array $validationRules): bool {
				
		$dataCollection->each(function ($row, $idx) use ($validationRules) {
			
			$validator = Validator::make($row->toArray(), $validationRules);
			
			$validator->sometimes(['expiry', 'strike'], 'required', function ($data) {
				return in_array($data->asset_class, ['OPT', 'FOP']);
			});
			
			if ($validator->fails()) {
				$error_message = implode(' ', $validator->errors()->all());
				throw new TradeImportException('Data validation failed at ' . $row['description'] . ' ' . $error_message);
			}
		});
		
		return true;
	}
	
	/**
	 * @param array $data
	 *
	 * @return array
	 */
    public function map(array $data) : array {
		
		$dataCollection = $this->removeHeaders(collect($data));
	
		$resultCollection= $this->transformData($dataCollection);
		
		$this->validateMap($resultCollection,$this->getValidationRules());
	
		return $resultCollection->toArray();
	}
		
 
}