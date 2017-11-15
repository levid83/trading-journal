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
			$table->integer('trader_id')->unsigned()->index();
			$table->integer('client_id')	->nullable()->unsigned()->index();
			$table->integer('trade_log_file_id')->unsigned()->nullable()->index();
			$table->char('underlying', 10)->index();
			$table->char('asset_class', 10)->index();
			$table->date('expiry')->nullable()->index();
			$table->decimal('strike', 10, 4)->nullable()->index();
			$table->char('put_call', 10)->nullable()->index();
			$table->char('currency', 5);
			$table->char('action', 10)->nullable()->index();
			$table->string('quantity', 191)->nullable()->index();
			$table->string('description', 191)->nullable();
			$table->string('financial_instrument', 191)->nullable();
			$table->string('symbol', 191)->nullable()->index();
			$table->decimal('price', 10, 4)->nullable();
			$table->dateTime('time')->nullable()->index();
			$table->string('exchange', 191)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->string('submitter', 191)->nullable();
			$table->string('execution_id', 191)->nullable()->index();
			$table->decimal('commission', 10)->nullable();
			$table->decimal('realized_pl', 10, 4)->nullable();
			$table->string('order_id', 191)->nullable()->index();
			$table->string('exch_exec_id', 191)->nullable();
			$table->string('exch_order_id', 191)->nullable();
			$table->string('trading_class', 191)->nullable()->index();
			$table->decimal('price_incl_fees', 10, 4)->nullable();
			$table->char('account', 50)->nullable()->index();
			$table->string('open_close', 191)->nullable()->index();
			$table->string('solicited_by_ibroker', 191)->nullable();
			$table->decimal('costbasis', 12,4)->nullable();
			$table->integer('conid')->nullable()->index();
			$table->dateTime('order_time')->nullable()->index();
			$table->char('order_type',10)->nullable()->index();
			$table->text('json')->nullable();
			$table->boolean('processed')->default(false);
			
			$table->timestamps();
			
			$table->foreign('trade_log_file_id', 'FK_trade_logs_trade_log_file_id')->references('id')->on('trade_log_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trader_id', 'FK_trade_logs_trader_id')->references('id')->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('client_id', 'FK_trade_logs_client_id')->references('id')	->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
			
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
