<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradingAccount extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'account_id','account_name','account_type'
    ];


    public function tradeLogs(){
        return $this->hasMany('App\TradeLog');
    }
}
