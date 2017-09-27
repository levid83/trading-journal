<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\Trade');
    }
}
