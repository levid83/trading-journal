<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTradingAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trading_accounts', function (Blueprint $table) {
			$table->integer('user_id')
				->nullable()
				->unsigned()
				->after('id')
				->index('FK_trading_accounts_user_id');
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
        Schema::table('trading_accounts', function (Blueprint $table) {
			$table->dropForeign('FK_trading_accounts_user_id');
			$table->dropIndex('FK_trading_accounts_user_id');
			$table->dropColumn('user_id');
        });
    }
}
