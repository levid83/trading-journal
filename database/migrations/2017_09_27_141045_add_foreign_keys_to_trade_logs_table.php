<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTradeLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trade_logs', function(Blueprint $table)
		{
			$table->foreign('trade_log_file_id', 'FK_trade_logs_trade_log_file_id')->references('id')->on('trade_log_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trader_id', 'FK_trade_logs_trader_id')->references('id')->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trade_logs', function(Blueprint $table)
		{
			$table->dropForeign('FK_trade_logs_trade_log_file_id');
			$table->dropForeign('FK_trade_logs_trader_id');
		});
	}

}
