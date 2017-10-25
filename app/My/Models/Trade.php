<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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
}
