<?php

namespace App\My\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	
	/**
	 * @var array
	 */
	protected $fillable = ['body'];
	
	/**
	 * Get all of the owning commentable models.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function commentable()
	{
		return $this->morphTo();
	}
}
