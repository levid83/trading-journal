<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $symbol
 * @property float $multiplier
 * @property string $created_at
 * @property string $updated_at
 */
class Asset extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'name', 'symbol', 'multiplier'];

    protected $dates=['created_at','updated_at'];

}
