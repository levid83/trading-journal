<?php

	namespace App\My\Repositories\Eloquent;
	
	use App\My\Classes\TradeFilters;
	use App\My\Models\Asset;
	use App\My\Models\Position;
	use App\My\Models\Tactic;
	use App\My\Models\TradingAccount;
	use Illuminate\Support\Facades\Auth;
	
	use App\My\Repositories\Contracts\TradeRepositoryInterface;
	use App\My\Models\Trade;
	use phpDocumentor\Reflection\Types\This;
	
	class TradeRepository extends Repository implements TradeRepositoryInterface
	{
		
		/**
		 * @var Trade
		 */
		protected $model;
		/**
		 * @param Trade $model
		 */
		function __construct(Trade $model)
		{
			$this->model = $model;
		}
		
		
		public function tradeTypes(){
			return Trade::TRADE_TPYES;
		}
		
		public function assetClasses(){
			return Trade::ASSET_CLASSES;
		}
		
		public function actions(){
			return Trade::ACTIONS;
		}
		
		public function optionTypes(){
			return Trade::OPTION_TYPES;
		}
		
		public function search($filters){
			
			return Trade::with('tactic')
				->with('position')
				->with('trader')
				->with('client')
				->filterUser(Auth::user())->filter($filters);
		}
		
		public function positions($filters=null){
			$filters->only(['filterClient','filterTrader', 'filterUnderlying']);

			return Position::whereHas('trades',
				function($query) use ($filters){
					$query->filter($filters);
				}
			)->orderBy('id','desc')->get();
		}
		
		public function traders($filters=null){
			return TradingAccount::where('account_type', TradingAccount::TRADER)->orderBy('account_name', 'asc')->get();
		}
		
		public function clients($filters=null){
			return TradingAccount::where('account_type', TradingAccount::CLIENT)->orderBy('account_name', 'asc')->get();
		}
		
		
		public function tactics($filters=null){
			return Tactic::where('id', '>', 0)->orderBy('name', 'asc')->get();
		}
		
		public function assets($filters=null){
			return Asset::all();
		}
		
	}