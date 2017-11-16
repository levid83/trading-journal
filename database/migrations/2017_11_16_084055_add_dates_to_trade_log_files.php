<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesToTradeLogFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_log_files', function (Blueprint $table){
			$table->dateTime('start_date' )->after('file_name')->nullable()->index();
			$table->dateTime('end_date' )->after('start_date')->nullable()->index();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('trade_log_files', function (Blueprint $table){
			$table->dropColumn('start_date');
			$table->dropColumn('end_date');
		});
    }
}
