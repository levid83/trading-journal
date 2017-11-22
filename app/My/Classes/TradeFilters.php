<?php
	
	namespace App\My\Classes;
	
	
	use App\My\QueryFilters;
	use Illuminate\Database\Eloquent\Builder;
	
	class TradeFilters extends QueryFilters
	{
		
		public function filterClient($filterClient=null){
			return $this->builder->filterClient($filterClient);
		}
		
		public function filterTrader($filterTrader=null){
			return $this->builder->filterTrader($filterTrader);
		}
		
		public function filterUnderlying($filterUnderlying=null){
			return $this->builder->filterUnderlying($filterUnderlying);
		}
		
		public function filterPosition($filterPosition=null){
			return $this->builder->filterPosition($filterPosition);
		}
		
		public function filterTactic($filterTactic=null){
			return $this->builder->filterTactic($filterTactic);
		}
		
		public function filterStatus($filterStatus=null){
			return $this->builder->filterStatus($filterStatus);
		}
		
		public function filterAssetClass($filterAssetClass=null){
			return $this->builder->filterAssetClass($filterAssetClass);
		}
		
		public function filterAction($filterAction=null){
			return $this->builder->filterAction($filterAction);
		}
		
		public function filterStrikeFrom($filterStrikeFrom=null){
			return $this->builder->filterStrikeFrom($filterStrikeFrom);
		}
		
		public function filterStrikeTo($filterStrikeTo=null){
			return $this->builder->filterStrikeTo($filterStrikeTo);
		}
		
		public function filterPutCall($filterPutCall=null){
			return $this->builder->filterPutCall($filterPutCall);
		}
		
		public function filterExpiryFrom($filterExpiryFrom=null){
			return $this->builder->filterExpiryFrom($filterExpiryFrom);
		}
		
		public function filterExpiryTo($filterExpiryTo=null){
			return $this->builder->filterExpiryTo($filterExpiryTo);
		}
		
		public function filterOpenDateFrom($filterOpenDateFrom=null){
			return $this->builder->filterOpenDateFrom($filterOpenDateFrom);
		}
		
		public function filterOpenDateTo($filterOpenDateTo=null){
			return $this->builder->filterOpenDateTo($filterOpenDateTo);
		}
		
		public function filterCloseDateFrom($filterCloseDateFrom=null){
			return $this->builder->filterCloseDateFrom($filterCloseDateFrom);
		}
		
		public function filterCloseDateTo($filterCloseDateTo=null){
			return $this->builder->filterCloseDateTo($filterCloseDateTo);
		}
		
	}