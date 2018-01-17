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
	
	//mutators & acccessors
	
	public function generateName(){
		if(!is_null($this->id )) {
			$trades=Trade::where('position_id', $this->id)->orderBy('open_date','asc')->get();
			$this->name=$trades->implode('TradeFullName',', ');
		}
	}
 
	//relations
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
	
	/**
	 * Get all of the position's comments.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable');
	}
}
