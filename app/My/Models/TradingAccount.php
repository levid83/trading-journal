<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $account_id
 * @property string $account_name
 * @property string $account_type
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property TradeLogFile[] $tradeLogFiles
 * @property TradeLog[] $tradeLogs
 * @property Trade[] $clientTrades
 * @property Trade[] $traderTrades
 */
class TradingAccount extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['account_id', 'account_name', 'account_type', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tradeLogFiles()
    {
        return $this->hasMany('App\My\Models\TradeLogFile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tradeLogs()
    {
        return $this->hasMany('App\My\Models\TradeLog');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientTrades()
    {
        return $this->hasMany('App\My\Models\Trade', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function traderTrades()
    {
        return $this->hasMany('App\My\Models\Trade', 'trader_id');
    }
}
