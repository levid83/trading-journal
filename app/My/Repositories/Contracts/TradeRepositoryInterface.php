<?php
	namespace App\My\Repositories\Contracts;
	
	interface TradeRepositoryInterface{
		
		const OPEN_TRADE  = 'OPEN';
		const CLOSE_TRADE = 'CLOSE';
		
		const BUY         = 'BUY';
		const SELL        = 'SELL';
		
		const PUT         = 'PUT';
		const CALL        = 'CALL';
		
		public function tradeTypes();
		
		public function assetClasses();
		
		public function actions();
		
		public function optionTypes();
		
		public function positions($filters);
		
		public function traders($filters);
		
		public function clients($filters);
		
		public function tactics($filters);
		
		public function assets($filters);
		
		public function search($filters);
		

		
	}