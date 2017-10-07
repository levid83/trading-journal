<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $trade_log_file_id
 * @property int $trading_account_id
 * @property string $drill_down
 * @property string $underlying
 * @property string $security_type
 * @property string $last_trading_day
 * @property float $strike
 * @property string $put_call
 * @property string $currency
 * @property string $action
 * @property string $action_subtype
 * @property string $quantity
 * @property string $comb
 * @property string $description
 * @property string $financial_instrument
 * @property string $symbol
 * @property float $price
 * @property string $time
 * @property string $exchange
 * @property string $vwap_time
 * @property string $comment
 * @property string $submitter
 * @property string $order_ref
 * @property string $transaction_id
 * @property float $yield
 * @property float $tx_yield
 * @property float $commission
 * @property float $realized_pl
 * @property string $economic_value_rule
 * @property float $currency_price
 * @property float $volatility
 * @property string $vol_link
 * @property string $savings
 * @property string $key
 * @property string $destination
 * @property string $order_id
 * @property string $exch_exec_id
 * @property string $exch_order_id
 * @property string $ticket_id
 * @property string $more_info
 * @property string $trading_class
 * @property float $price_difference
 * @property float $price_incl_fees
 * @property string $account
 * @property string $cash_qty
 * @property string $clearing
 * @property string $clearing_acct
 * @property string $soft_dollars
 * @property string $open_close
 * @property string $solicited
 * @property string $solicited_by_ibroker
 * @property string $created_at
 * @property string $updated_at
 * @property TradeLogFile $tradeLogFile
 * @property TradingAccount $tradingAccount
 */
class TradeLog extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['trade_log_file_id', 'trading_account_id', 'drill_down', 'underlying', 'security_type', 'last_trading_day', 'strike', 'put_call', 'currency', 'action', 'action_subtype', 'quantity', 'comb', 'description', 'financial_instrument', 'symbol', 'price', 'time', 'exchange', 'vwap_time', 'comment', 'submitter', 'order_ref', 'transaction_id', 'yield', 'tx_yield', 'commission', 'realized_pl', 'economic_value_rule', 'currency_price', 'volatility', 'vol_link', 'savings', 'key', 'destination', 'order_id', 'exch_exec_id', 'exch_order_id', 'ticket_id', 'more_info', 'trading_class', 'price_difference', 'price_incl_fees', 'account', 'cash_qty', 'clearing', 'clearing_acct', 'soft_dollars', 'open_close', 'solicited', 'solicited_by_ibroker', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tradeLogFile()
    {
        return $this->belongsTo('App\My\Models\TradeLogFile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tradingAccount()
    {
        return $this->belongsTo('App\My\Models\TradingAccount');
    }
}
