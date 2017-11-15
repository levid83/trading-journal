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
			$table->integer('strategy_id')->unsigned()->nullable()->index();
			$table->integer('position_id')->unsigned()->nullable()->index();
			$table->integer('tactic_id')->unsigned()->nullable()->index();
			$table->integer('trader_id')->unsigned()->index();
			$table->integer('client_id')->unsigned()->index();
			$table->string('status', 191)->index();
			$table->string('underlying',10)->default('')->index();
			$table->string('asset_class',10)->index();
			$table->string('action', 191)->index();
			$table->integer('quantity');
			$table->dateTime('expiration')->nullable()->index();
			$table->decimal('strike', 10, 4)->nullable()->index();
			$table->string('put_call', 191)->index();
			$table->decimal('bid', 10, 4)->nullable();
			$table->decimal('ask', 10, 4)->nullable();
			$table->string('currency', 191)->nullable()->index();
			$table->decimal('commission_open', 10)->nullable();
			$table->decimal('commission_close', 10)->nullable();
			$table->decimal('profit', 10, 4)->nullable()->index();
			$table->text('description', 65535)->nullable();
			$table->dateTime('open_date')->nullable()->index();
			$table->dateTime('close_date')->nullable()->index();
			$table->string('exchange', 191)->nullable()->index();
			$table->string('trading_class', 191)->nullable()->index();
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('client_id', 'FK_trades_client_id')->references('id')->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('position_id', 'FK_trades_position_id')->references('id')->on('positions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('strategy_id', 'FK_trades_strategy_id')->references('id')->on('strategies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('tactic_id', 'FK_trades_tactic_id')->references('id')->on('tactics')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trader_id', 'FK_trades_trader_id')->references('id')->on('trading_accounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
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
