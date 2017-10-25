<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use PhpParser\Node\Expr\Array_;

/**
 * @property int $id
 * @property int $client_id
 * @property int $position_id
 * @property int $strategy_id
 * @property int $tactic_id
 * @property int $trader_id
 * @property string $status
 * @property string $action
 * @property int $quantity
 * @property string $security_type
 * @property string $expiration
 * @property float $strike
 * @property string $put_call
 * @property float $bid
 * @property float $ask
 * @property string $currency
 * @property float $commission_open
 * @property float $commission_close
 * @property float $profit
 * @property string $description
 * @property string $open_date
 * @property string $close_date
 * @property string $exchange
 * @property string $trading_class
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property TradingAccount $client
 * @property Position $position
 * @property Strategy $strategy
 * @property Tactic $tactic
 * @property TradingAccount $trader
 */
class Trade extends Model
{
	use Sortable;
	
	const TRADE_TPYES=['CLOSE'=>'CLOSE','OPEN'=>'OPEN'];
	const ASSET_CLASSES=['FOP'=>'FOP','FUT'=>'FUT','OPT'=>'OPT','STK'=>'STK'];
	const ACTIONS=['BUY'=>'BUY','SELL'=>'SELL'];
	const OPTION_TYPES=['CALL'=>'CALL','PUT'=>'PUT'];
	
	const OPEN_TRADE  = 'OPEN';
	const CLOSE_TRADE = 'CLOSE';
	
	const BUY         = 'BUY';
	const SELL        = 'SELL';
	
	const PUT         = 'PUT';
	const CALL        = 'CALL';
	
	/**
     * @var array
     */
    protected $guarded = ['position_id', 'strategy_id', 'tactic_id'];
    
    public $sortable=['id','underlying','asset_class','action','expiration','strike','put_call','profit','open_date','close_date','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\My\Models\TradingAccount', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\My\Models\Position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function strategy()
    {
        return $this->belongsTo('App\My\Models\Strategy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tactic()
    {
        return $this->belongsTo('App\My\Models\Tactic');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader()
    {
        return $this->belongsTo('App\My\Models\TradingAccount', 'trader_id');
    }
	
	public function tradeLogs()
	{
		return $this->belongsToMany('App\My\Models\TradeLog','trade_log_trade');
	}
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $underlying
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterUnderLying($query, $underlying){

		if ($underlying!=''){
			$query->where('underlying','like',$underlying.'%');
		}
 		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $position
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterPosition($query, $position){
		
		if ($position!=''){
			$query->where('position_id',$position);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $tactic
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterTactic($query, $tactic){
		
		if ($tactic!=''){
			$query->where('tactic_id',$tactic);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $status
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterStatus($query, $status){
		
		if ($status!=''){
			$query->where('status',$status);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $assetClass
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterAssetClass($query, $assetClass){
		
		if ($assetClass!=''){
			$query->where('asset_class',$assetClass);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $action
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterAction($query, $action){
		
		if ($action!=''){
			$query->where('action',$action);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $strike
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterStrike($query, $strike){
		
		if ($strike!=''){
			$query->where('strike',$strike);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $putCall
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterPutCall($query, $putCall){
		
		if ($putCall!=''){
			$query->where('put_call',$putCall);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $startDate
	 * @param mixed $endDate
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterExpiry($query, $startDate, $endDate){
		
		if ($startDate!=''){
			$query->where('expiration','>=',$startDate);
		}
		if ($endDate!=''){
			$query->where('expiration','<=',$endDate);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $startDate
	 * @param mixed $endDate
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterOpenDate($query, $startDate, $endDate){
		
		if ($startDate!=''){
			$query->where('open_date','>=',$startDate);
		}
		if ($endDate!=''){
			$query->where('open_date','<=',$endDate);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $startDate
	 * @param mixed $endDate
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterCloseDate($query, $startDate, $endDate){
		
		if ($startDate!=''){
			$query->where('close_date','>=',$startDate);
		}
		if ($endDate!=''){
			$query->where('close_date','<=',$endDate);
		}
		return $query;
	}
}
