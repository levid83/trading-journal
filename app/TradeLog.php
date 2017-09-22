<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeLog extends Model
{
    public function tradeLogFile(){
        return $this->belongsTo('App\TradeLogFile');
    }
}
