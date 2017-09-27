<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    /**
     * @var array
     */
    protected $fillable = ['client_id', 'position_id', 'strategy_id', 'tactic_id', 'trader_id', 'status', 'action', 'quantity', 'security_type', 'expiration', 'strike', 'put_call', 'bid', 'ask', 'currency', 'commission_open', 'commission_close', 'profit', 'description', 'open_date', 'close_date', 'exchange', 'trading_class', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\TradingAccount', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function strategy()
    {
        return $this->belongsTo('App\Strategy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tactic()
    {
        return $this->belongsTo('App\Tactic');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader()
    {
        return $this->belongsTo('App\TradingAccount', 'trader_id');
    }
}
