<?php
/**
 * Created by PhpStorm.
 * User: Levi
 * Date: 2017-10-06
 * Time: 11:28 AM
 */

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
        'trader_id' => null,
        'trade_log_file_id' =>null,
		'client_id'=>null,
        'account' => 'account',
        'execution_id' => 'id',
        'underlying' => 'underlying',
        'asset_class' => 'security_type',
        'expiry' => 'last_trading_day',
        'strike' => 'strike',
        'put_call' => 'putcall',
        'currency' => 'currency',
        'action' => 'action',
        'quantity' => 'quantity',
        'description' => 'description',
        'financial_instrument' => 'fin_instrument',
        'symbol' => 'symbol',
        'price'=> 'price',
        'time'=> 'time', /* Time + Date*/
        'exchange' => 'exch.',
        'comment' => 'comment',
        'submitter' => 'submitter',
        'commission' => 'commission',
        'realized_pl' => 'realized_pl',
        'order_id' => 'order_id',
        'exch_exec_id' => 'exch._exec._id',
        'exch_order_id' => 'exch._order_id',
        'trading_class' => 'trading_class',
        'price_incl_fees' => 'price_incl._fees',
        'open_close' => 'openclose',
		'json'=>null,
    ];

    private $accountId;
    private $tradeLogEntityId;
    private $data;
    private $map;
	
	/**
	 * @param array $row
	 *
	 * @return bool
	 */
    private function isCombo($row=[]){
        if (isset($row['comb.']) && $row['comb.']!=''){
            return true;
        }else{
            return false;
        }
    }
	
	private function fixOpenClose($row=[]){
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
	
	private function fixAction($row=[]){
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
	private function fixPutCall($row=[]){
		if (isset($row['putcall'])) {
			$str = strtoupper(trim($row['putcall']));
			if ($str && $str[0] == 'P') {
				return Trade::PUT;
			} elseif ($str && $str[0] == 'C') {
				return Trade::CALL;
			} else {
				return '';
			}
		}else{
			return '';
		}
		
	}
 
	/**
	 * @param array $row
	 *
	 * @return array
	 */
    private function fixPriceAndStrikePrice($row=[]){

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
    private function fixDatetime($row=[]){

        $row['time'] = isset($row['date']) ? substr($row['date'], 0, 4) . '-' . substr($row['date'], 4, 2) . '-'
            . substr($row['date'], 6, 2) . ' ' . (isset($row['time']) ? $row['time'] : '00:00:00') : '0000-00-00 00:00:00';

        return $row['time'];
    }
	
    private function setClientId($row){
 		$account=TradingAccount::where('account_id',$row['account'])->orWhere('account_name',$row['account'])->first();
    	if (!$account){
			$account=TradingAccount::create(['account_id'=>$row['account'],
											 'account_name'=> $row['account'],
											 'account_type'=> '',
											]);
		}
		$row['client_id'] = $account->id;
		return $row['client_id'];
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
	 * @param array $params
	 */
    public function map(Array $params=array()){
        $this->map=[];
        if (!empty($this->data)){
            foreach ($this->data as $row) {
                if(!$this->isCombo($row)){
                    $aux = [];
                    foreach (self::MAP as $key => $item) {
                        if (isset($row[$item])) {
                            $aux[$key] = $row[$item];
                        }
                    }
					$aux['client_id']=$this->setClientId($row);
                    $aux['trader_id'] = $this->accountId;
                    $aux['trade_log_file_id'] = $this->tradeLogEntityId;
                    $aux['open_close']=$this->fixOpenClose($row);
					$aux['action']=$this->fixAction($row);
					$aux['put_call']=$this->fixPutCall($row);
                    list($aux['price'], $aux['strike']) = $this->fixPriceAndStrikePrice($row);
                    $aux['time'] = $this->fixDateTime($row);
					$aux['json']=$row->toJson(); //save the raw json data
                    $this->map[] = $aux;
                }
            }
        }
    }
}