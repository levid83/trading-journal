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
			$table->integer('user_id')->nullable()->unsigned()->index();
			$table->char('account_id', 50)->index();
			$table->char('account_name', 50)->index();
			$table->char('account_type', 50);
			$table->softDeletes();
			$table->timestamps();
			
			$table->foreign('user_id', 'FK_trading_accounts_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
