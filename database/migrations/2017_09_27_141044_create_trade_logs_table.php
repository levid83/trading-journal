<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTradeLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trade_logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('trader_id')->unsigned()->index('FK_trade_logs_trader_id');
			$table->integer('trade_log_file_id')->unsigned()->nullable()->index('FK_trade_logs_trade_log_file_id');
			$table->string('drill_down', 191)->nullable();
			$table->char('underlying', 10);
			$table->char('security_type', 10);
			$table->date('last_trading_day')->nullable();
			$table->decimal('strike', 10, 4)->nullable();
			$table->char('put_call', 10)->nullable();
			$table->char('currency', 5)->nullable();
			$table->char('action', 10)->nullable();
			$table->char('action_subtype', 10)->nullable();
			$table->string('quantity', 191)->nullable();
			$table->string('comb', 191)->nullable();
			$table->string('description', 191)->nullable();
			$table->string('financial_instrument', 191)->nullable();
			$table->string('symbol', 191)->nullable();
			$table->decimal('price', 10, 4)->nullable();
			$table->dateTime('time')->nullable();
			$table->string('exchange', 191)->nullable();
			$table->dateTime('vwap_time')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->string('submitter', 191)->nullable();
			$table->string('order_ref', 191)->nullable();
			$table->string('transaction_id', 191)->nullable();
			$table->decimal('yield', 10, 4)->nullable();
			$table->decimal('tx_yield', 10, 4)->nullable();
			$table->decimal('commission', 10)->nullable();
			$table->decimal('realized_pl', 10, 4)->nullable();
			$table->string('economic_value_rule', 191)->nullable();
			$table->decimal('currency_price', 10, 4)->nullable();
			$table->decimal('volatility', 10, 4)->nullable();
			$table->string('vol_link', 191)->nullable();
			$table->string('savings', 191)->nullable();
			$table->string('key', 191)->nullable();
			$table->string('destination', 191)->nullable();
			$table->string('order_id', 191)->nullable();
			$table->string('exch_exec_id', 191)->nullable();
			$table->string('exch_order_id', 191)->nullable();
			$table->string('ticket_id', 191)->nullable();
			$table->text('more_info', 65535)->nullable();
			$table->string('trading_class', 191)->nullable();
			$table->decimal('price_difference', 10, 4)->nullable();
			$table->decimal('price_incl_fees', 10, 4)->nullable();
			$table->char('account', 50)->nullable();
			$table->string('cash_qty', 191)->nullable();
			$table->string('clearing', 191)->nullable();
			$table->string('clearing_acct', 191)->nullable();
			$table->string('soft_dollars', 191)->nullable();
			$table->string('open_close', 191)->nullable();
			$table->string('solicited', 191)->nullable();
			$table->string('solicited_by_ibroker', 191)->nullable();
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
		Schema::drop('trade_logs');
	}

}
