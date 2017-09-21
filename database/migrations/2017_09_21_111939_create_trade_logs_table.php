<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('trade_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trade_import_file_id');
            $table->string('drill_down')->nullable();
            $table->char('underlying',10);
            $table->char('security_type',10);
            $table->date('last_trading_day')->nullable();
            $table->decimal('strike',10,4)->nullable();
            $table->char('put_call',10)->nullable();
            $table->char('currency',5);
            $table->char('action',10);
            $table->char('action_subtype',10);
            $table->string('quantity');
            $table->string('comb')->nullable();
            $table->string('description');
            $table->string('financial_instrument');
            $table->string('symbol');
            $table->decimal('price',10,4);
            $table->dateTime('time');
            $table->string('exchange');
            $table->dateTime('vwap_time')->nullable();
            $table->text('comment');
            $table->string('submitter');
            $table->string('order_ref')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('yield',10,4)->nullable();
            $table->decimal('tx_yield',10,4)->nullable();
            $table->decimal('commission',10,4)->nullable();
            $table->decimal('realized_pl',10,4)->nullable();
            $table->string('economic_value_rule')->nullable();
            $table->decimal('currency_price',10,4)->nullable();
            $table->decimal('volatility',10,4)->nullable();
            $table->string('vol_link')->nullable();
            $table->string('savings')->nullable();
            $table->string('key')->nullable();
            $table->string('destination')->nullable();
            $table->string('order_id');
            $table->string('exch_exec_id')->nullable();
            $table->string('exch_order_id')->nullable();
            $table->string('ticket_id')->nullable();
            $table->text('more_info');
            $table->string('trading_class')->nullable();
            $table->decimal('price_difference',10,4)->nullable();
            $table->decimal('price_incl_fees',10,4)->nullable();
            $table->char('account',50);
            $table->string('cash_qty')->nullable();
            $table->string('clearing')->nullable();
            $table->string('clearing_acct')->nullable();
            $table->string('soft_dollars')->nullable();
            $table->string('open_close')->nullable();
            $table->string('solicited')->nullable();
            $table->string('solicited_by_ibroker')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_logs');
    }
}
