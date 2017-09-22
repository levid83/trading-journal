<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\SoftDeletes;

class CreateTradingAccountsTable extends Migration
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'account_id','account_name','account_type'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_accounts', function (Blueprint $table) {

            $table->increments('id');

            $table->char('account_id',50);
            $table->char('account_name',50);
            $table->enum('account_type',['trader','client']);

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
        Schema::dropIfExists('trading_accounts');
    }
}
