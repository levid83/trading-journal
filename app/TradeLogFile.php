<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $trading_account_id
 * @property string $file_name
 * @property string $last_modification
 * @property string $created_at
 * @property string $updated_at
 * @property TradingAccount $tradingAccount
 * @property TradeLog[] $tradeLogs
 */
class TradeLogFile extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['trading_account_id', 'file_name', 'last_modification', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tradingAccount()
    {
        return $this->belongsTo('App\TradingAccount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tradeLogs()
    {
        return $this->hasMany('App\TradeLog');
    }
}
