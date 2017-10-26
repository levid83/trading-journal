<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldClientIdToTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('trade_logs', function (Blueprint $table){
			$table->integer('client_id')
				->nullable()
				->unsigned()
				->after('trader_id')
				->index('FK_trade_logs_client_id');
			$table->foreign('client_id', 'FK_trade_logs_client_id')
				->references('id')
				->on('trading_accounts')
				->onUpdate('RESTRICT')
				->onDelete('RESTRICT');
			
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
		Schema::table('trade_logs', function (Blueprint $table){
			
			$table->dropForeign('FK_trade_logs_client_id');
			$table->dropIndex('FK_trade_logs_client_id');
			$table->dropColumn('client_id');
			
			$table->dropForeign('trade_log_file_id');
			$table->dropForeign('trader_id');
			
		});
    }
}
