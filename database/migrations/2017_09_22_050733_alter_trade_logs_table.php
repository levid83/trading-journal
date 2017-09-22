<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_logs', function($table) {
            $table->renameColumn('trade_import_file_id', 'trade_log_file_id');
            $table->integer('trading_account_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_logs', function($table) {
            $table->renameColumn('trade_log_file_id', 'trade_import_file_id');
            $table->dropColumn('trading_account_id');
        });
    }
}
