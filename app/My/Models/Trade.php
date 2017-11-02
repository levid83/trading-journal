<?php

namespace App\My\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
	
	const TRADE_TPYES=['CLOSED'=>'CLOSED','OPEN'=>'OPEN'];
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
		
	//mutators
    public function getRoundedAskAttribute(){
    	return (!is_null($this->ask)?round($this->ask,2):null);
	}
	public function getRoundedBidAttribute(){
		return (!is_null($this->bid)?round($this->bid,2):null);
	}
	public function getRoundedStrikeAttribute(){
		return (!is_null($this->strike)?round($this->strike,2):null);
	}
	
	public function getRoundedProfitAttribute(){
		return (!is_null($this->profit)?round($this->profit,2):null);
	}
	public function getFormatedExpirationAttribute(){
    	return (!is_null($this->expiration)?date("Md'y",strtotime($this->expiration)):null);
	}
    
    public function getTradeFullNameAttribute(){
     	if (in_array($this->asset_class,[self::ASSET_CLASSES['STK'],self::ASSET_CLASSES['FUT']])){
    		if ($this->action==self::ACTIONS['BUY']) {
				return "{$this->action[0]}{$this->quantity}{$this->underlying}@{$this->roundedAsk}";
			}
			if ($this->action==self::ACTIONS['SELL']) {
				return "{$this->action[0]}{$this->quantity}{$this->underlying}@{$this->roundedBid}";
			}
		}else{
			
			if ($this->action==self::ACTIONS['BUY']) {
				return "{$this->underlying}-{$this->action[0]}{$this->quantity}-{$this->formatedExpiration}-{$this->roundedStrike}{$this->put_call[0]}@{$this->roundedAsk}";
			}
			if ($this->action==self::ACTIONS['SELL']) {
				return "{$this->underlying}-{$this->action[0]}{$this->quantity}-{$this->formatedExpiration}-{$this->roundedStrike}{$this->put_call[0]}@{$this->roundedBid}";
			}
		}
	}
 
	//relations
	
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
	
	//scopes
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param \App\User $user
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeUserAllowedTrades($query, User $user=null){
		if(!is_null($user) && !$user->isSuperAdmin()) {
			//the user can access his own trades only
				$query->whereHas('trader.user', function ($query) {
					$query->where('id', Auth::user()->id);
				});
		}
		
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $client
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterClient($query, $client){
		
		if ($client!=''){
			$query->where('client_id',$client);
		}
		return $query;
	}
	
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $trader
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterTrader($query, $trader){

		if ($trader!=''){
			$query->where('trader_id',$trader);
		}
 		return $query;
	}
	/**
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param mixed $underlying
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterUnderLying($query, $underlying){

		if ($underlying!=''){
			if (str_contains($underlying, ',')){
				$underlying = preg_replace('/\s+/', ' ', $underlying);
				$query->whereIn('underlying',explode(',', $underlying));
			}else {
				$query->where('underlying', 'like', $underlying);
			}
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
		if ($position!='') {
			if ($position == '0') {
				$query->whereNull('position_id');
			} else {
				$query->where('position_id', $position);
			}
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
			if ($tactic=='0') {
				$query->whereNull('tactic_id');
			}else{
				$query->where('tactic_id', $tactic);
			}
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
	 * @param mixed $strike_from
	 * @param mixed $strike_to
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilterStrike($query, $strike_from, $strike_to ){
		
		if ($strike_from!=''){
			$query->where('strike','>=',$strike_from);
		}
		if ($strike_to!=''){
			$query->where('strike','<=',$strike_to);
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
