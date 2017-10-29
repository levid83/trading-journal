<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 50)->nullable();
			$table->string('name', 50);
			$table->string('symbol', 10);
			$table->string('aliases', 100)->nullable();
			$table->decimal('multiplier', 10, 0)->nullable()->default(1);
            $table->decimal('price_correction', 10, 0)->nullable()->default(1);
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
		Schema::drop('assets');
	}

}
