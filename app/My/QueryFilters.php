<?php
	namespace App\My;
	use Illuminate\Database\Eloquent\Builder;
	use Illuminate\Http\Request;
	use PhpParser\Node\Expr\Array_;
	
	abstract class QueryFilters
	{
		/**
		 * The request object.
		 *
		 * @var Request
		 */
		protected $request;
		/**
		 * The builder instance.
		 *
		 * @var Builder
		 */
		protected $builder;
		
		/**
		 * Only these filters will be applied
		 *
		 * @var Array
		 */
		protected $only=[];
		
		/**
		 * Create a new QueryFilters instance.
		 *
		 * @param Request $request
		 */
		public function __construct(Request $request)
		{
			$this->request = $request;
		}
		
		/**
		 * Set the exclusively applied filters
		 * @param array $only
		 */
		public function only(Array $only){
			$this->only=$only;
		}
		
		/**
		 * Apply the filters to the builder.
		 *
		 * @param  Builder $builder
		 * @return Builder
		 */
		public function apply(Builder $builder)
		{
			$this->builder = $builder;
			foreach ($this->filters() as $name => $value) {
				if (! method_exists($this, $name)) {
					continue;
				}
				//check if the exclusive filters are setted
				if (!empty($this->only)){
					if (!in_array($name, $this->only)){
						continue;
					}
				}
				
				if (strlen($value)) {
					$this->$name($value);
				} else {
					$this->$name();
				}
			}
			return $this->builder;
		}
		/**
		 * Get all request filters data.
		 *
		 * @return array
		 */
		public function filters()
		{
			return $this->request->all();
		}
	}