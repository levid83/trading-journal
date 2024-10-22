<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
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
    protected $fillable = ['client_id', 'file_name', 'start_date', 'end_date', 'last_modification', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tradingAccount()
    {
        return $this->belongsTo('App\My\Models\TradingAccount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tradeLogs()
    {
        return $this->hasMany('App\My\Models\TradeLog');
    }
}
