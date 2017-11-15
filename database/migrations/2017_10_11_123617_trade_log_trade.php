<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TradeLogTrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('trade_log_trade',function (Blueprint $table){
			$table->increments('id');
			
			$table->integer('trade_log_id')->unsigned()->index();
			$table->foreign('trade_log_id','FK_trade_logs_id')->references('id')->on('trade_logs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
			$table->integer('trade_id')->unsigned()->index();
			$table->foreign('trade_id','FK_trade_id')->references('id')->on('trades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
			$table->index(['trade_log_id','trade_id']);
			
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
		Schema::drop('trade_log_trade');
    }
}
