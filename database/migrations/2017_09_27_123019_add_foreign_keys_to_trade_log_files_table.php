<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTradeLogFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trade_log_files', function(Blueprint $table)
		{
			$table->foreign('trading_account_id', 'FK_trade_log_files_account_id')->references('id')->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trade_log_files', function(Blueprint $table)
		{
			$table->dropForeign('FK_trade_log_files_account_id');
		});
	}

}
