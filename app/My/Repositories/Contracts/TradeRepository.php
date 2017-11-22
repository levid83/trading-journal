<?php
	namespace App\My\Repositories\Contracts;
	
	interface TradeRepository{
	
		public function search($filters);
	}