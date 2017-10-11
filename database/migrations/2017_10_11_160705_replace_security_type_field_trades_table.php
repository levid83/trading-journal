<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceSecurityTypeFieldTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('trades', function (Blueprint $table){
			$table->dropColumn('security_type');
			$table->string('asset_class',10)->after('underlying');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('trades', function (Blueprint $table){
			$table->dropColumn('asset_class');
			$table->string('security_type',10)->after('underlying');
		});
    }
}
