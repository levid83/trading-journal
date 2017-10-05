<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_logs',function (Blueprint $table){
            $table->dropColumn('drill_down');
            $table->dropColumn('action_subtype');
            $table->dropColumn('comb');
            $table->dropColumn('vwap_time');
            $table->dropColumn('order_ref');
            $table->dropColumn('clearing');
            $table->dropColumn('clearing_acct');
            $table->dropColumn('yield');
            $table->dropColumn('tx_yield');
            $table->dropColumn('economic_value_rule');
            $table->dropColumn('currency_price');
            $table->dropColumn('vol_link');
            $table->dropColumn('savings');
            $table->dropColumn('key');
            $table->dropColumn('soft_dollars');
            $table->dropColumn('destination');
            $table->dropColumn('ticket_id');
            $table->dropColumn('more_info');
            $table->dropColumn('price_difference');
            $table->dropColumn('cash_qty');
            $table->dropColumn('solicited');
            $table->dropColumn('solicited_by_ibroker');
            $table->dropColumn('volatility');

            $table->renameColumn('transaction_id','execution_id');
            $table->renameColumn('security_type','asset_class');
            $table->renameColumn('last_trading_day','expiry');

            $table->decimal('costbasis', 12,4)->nullable();
            $table->integer('conid')->nullable();

            $table->dateTime('order_time')->nullable();
            $table->char('order_type',10)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_logs',function (Blueprint $table) {
            $table->string('drill_down', 191)->nullable();
            $table->char('action_subtype', 10)->nullable();
            $table->string('comb', 191)->nullable();
            $table->dateTime('vwap_time')->nullable();
            $table->string('order_ref', 191)->nullable();
            $table->string('clearing', 191)->nullable();
            $table->string('clearing_acct', 191)->nullable();
            $table->decimal('yield', 10, 4)->nullable();
            $table->decimal('tx_yield', 10, 4)->nullable();
            $table->string('economic_value_rule', 191)->nullable();
            $table->decimal('currency_price', 10, 4)->nullable();
            $table->string('vol_link', 191)->nullable();
            $table->string('savings', 191)->nullable();
            $table->string('key', 191)->nullable();
            $table->string('soft_dollars', 191)->nullable();
            $table->string('destination', 191)->nullable();
            $table->string('ticket_id', 191)->nullable();
            $table->text('more_info', 65535)->nullable();
            $table->decimal('price_difference', 10, 4)->nullable();
            $table->string('cash_qty', 191)->nullable();
            $table->string('solicited', 191)->nullable();
            $table->string('solicited_by_ibroker', 191)->nullable();
            $table->decimal('volatility', 10, 4)->nullable();

            $table->renameColumn('execution_id','transaction_id');
            $table->renameColumn('asset_class','security_type');
            $table->renameColumn('expiry','last_trading_day');

            $table->dropColumn('costbasis');
            $table->dropColumn('conid');

            $table->dropColumn('order_time');
            $table->dropColumn('order_type');

        });
    }
}
