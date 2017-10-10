<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJsonFieldToTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_logs', function (Blueprint $table){
    		$table->text('json')->nullable();
    		$table->boolean('processed')->default(false);
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
			$table->dropColumn('json');
			$table->dropColumn('processed');
		});
    
    }
}
