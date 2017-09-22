<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeLogFile extends Model
{

    protected $fillable=['trading_account_id','file_name','last_modification'];

    public function tradeLogs(){
        return $this->hasMany('App\TradeLog');
    }
}
