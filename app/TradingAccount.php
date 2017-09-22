<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingAccount extends Model
{
    //

    public function tradeLogs(){
        return $this->hasMany('App\TradeLog');
    }
}
