<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTradingAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trading_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('account_id', 50);
			$table->char('account_name', 50);
			$table->enum('account_type', array('trader','client'));
			$table->softDeletes();
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
		Schema::drop('trading_accounts');
	}

}
