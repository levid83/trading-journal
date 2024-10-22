<?php
	namespace App\My\Traits;
	use App\My\QueryFilters;
	use Illuminate\Database\Eloquent\Builder;
	trait Filterable
	{
		/**
		 * Filter a result set.
		 *
		 * @param  Builder      $query
		 * @param  QueryFilters $filters
		 * @return Builder
		 */
		public function scopeFilter($query, QueryFilters $filters)
		{
			return $filters->apply($query);
		}
	}