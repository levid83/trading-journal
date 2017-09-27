<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTradeLogFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trade_log_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('trading_account_id')->unsigned()->index('FK_trade_log_files_account_id');
			$table->string('file_name', 191);
			$table->dateTime('last_modification');
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
		Schema::drop('trade_log_files');
	}

}
