<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property int $counter
 * @property string $name
 * @property Trade[] $trades
 */
class Position extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['counter', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
    
    public function generateName(){
    	if(!is_null($this->id )) {
			$trades=Trade::where('position_id', $this->id)->orderBy('open_date','asc')->get();
			$this->name=$trades->implode('TradeFullName',', ');
		}
	}
}
