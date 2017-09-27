<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trades', function(Blueprint $table)
		{
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
		Schema::table('trades', function(Blueprint $table)
		{
			$table->dropForeign('FK_trades_client_id');
			$table->dropForeign('FK_trades_position_id');
			$table->dropForeign('FK_trades_strategy_id');
			$table->dropForeign('FK_trades_tactic_id');
			$table->dropForeign('FK_trades_trader_id');
		});
	}

}
