<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('strategy_id')->unsigned()->nullable()->index('FK_trades_strategy_id');
			$table->integer('position_id')->unsigned()->nullable()->index('FK_trades_position_id');
			$table->integer('tactic_id')->unsigned()->nullable()->index('FK_trades_tactic_id');
			$table->integer('trader_id')->unsigned()->index('FK_trades_account_id');
			$table->integer('client_id')->unsigned()->index('FK_trades_client_id');
			$table->string('status', 191);
			$table->string('action', 191);
			$table->integer('quantity');
			$table->string('security_type', 191)->nullable();
			$table->dateTime('expiration')->nullable();
			$table->decimal('strike', 10, 4)->nullable();
			$table->string('put_call', 191);
			$table->decimal('bid', 10, 4)->nullable();
			$table->decimal('ask', 10, 4)->nullable();
			$table->string('currency', 191)->nullable();
			$table->decimal('commission_open', 10)->nullable();
			$table->decimal('commission_close', 10)->nullable();
			$table->decimal('profit', 10, 4)->nullable();
			$table->text('description', 65535)->nullable();
			$table->dateTime('open_date')->nullable();
			$table->dateTime('close_date')->nullable();
			$table->string('exchange', 191)->nullable();
			$table->string('trading_class', 191)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trades');
	}

}
