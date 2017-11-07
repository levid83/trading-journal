<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\My\Models\Position;
use App\My\Models\TradingAccount;
use App\User;
use App\My\Models\Tactic;
use App\My\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;
use Session;
use DB;
use TCG\Voyager\Facades\Voyager;

class TradesController extends Controller
{
	private function updateTactics($tacticId, Array $trades){
		if (!empty($trades) && $tacticId>0){
			foreach ($trades as $id){
				$trade = Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->tactic_id = $tacticId;
					$trade->save();
				}
			}
		}
	}
	
	private function removeTactics(Array $trades){
		if (!empty($trades)){
			foreach ($trades as $id){
				$trade=Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->tactic_id = null;
					$trade->save();
				}
			}
		}
	}
	
	private function createNewPosition(Array $trades){
		if (!empty($trades)){
			//@todo set the position params
			$position=new Position();
			$position->counter=1;
			$position->name='';
			$position->save();

			foreach ($trades as $id){
				$trade = Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->position_id = $position->id;
					$trade->save();
				}
			}
			
			$position->generateName();
			$position->save();
		}
	}
	
	private function updatePositions($positionId, Array $trades){
		if (!empty($trades) && $positionId>0){
			//@todo update the position params
			foreach ($trades as $id){
				$trade=Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->position_id = $positionId;
					$trade->save();
				}
			}
			
			$position=Position::find($positionId);
			$position->generateName();
			$position->save();
		}
	}
	private function removePositions(Array $trades){
		if (!empty($trades)){
			foreach ($trades as $id){
				$trade=Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->postion_id = null;
					$trade->save();
				}
			}
		}
	}
	private function editTrades(Request $request){
		if (!empty($request->trade)) {
			if ($request->has('add_tactic') && isset($request->tactic_id)) {
				$this->updateTactics($request->tactic_id, $request->trade);
				
				Session::flash('success','Tactic successfully updated.');
			}
			if ($request->has('remove_tactic')) {
				$this->removeTactics($request->trade);
				
				Session::flash('success','Tactic successfully removed.');
			}
			
			if ($request->has('add_new_position')) {
				$this->createNewPosition($request->trade);
				
				Session::flash('success','New position successfully created.');
			}
			
			if ($request->has('add_to_position') && isset($request->position_id)) {
				$this->updatePositions($request->position_id, $request->trade);
				
				Session::flash('success','Position successfully updated.');
			}
			
			if ($request->has('remove_position')) {
				$this->removePositions($request->trade);
				Session::flash('success','Position successfully removed.');
			}
		}
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

    	if(Voyager::can('edit_trades')){
    		$this->editTrades($request);
		}else{
    		Session::flash("error","You have no permission to update these trades");
		}
//dd($request);
		//DB::enableQueryLog();
		$trades = Trade::with('tactic')
			->with('position')
			->with('trader')
			->with('client')
			->userAllowedTrades(Auth::user()) //only the user's trades
			->filterClient($request->input('filter_client_id'))
			->filterTrader($request->input('filter_trader_id'))
			->filterUnderlying($request->input('filter_underlying'))
			->filterPosition($request->input('filter_position_id'))
			->filterTactic($request->input('filter_tactic_id'))
			->filterStatus($request->input('filter_status'))
			->filterAssetClass($request->input('filter_asset_class'))
			->filterAction($request->input('filter_action'))
			->filterStrike($request->input('filter_strike_from'),$request->input('filter_strike_to'))
			->filterPutCall($request->input('filter_put_call'))
			->filterExpiry($request->input('filter_expiration_from'),$request->input('filter_expiration_to'))
			->filterOpenDate($request->input('filter_open_date_from'),$request->input('filter_open_date_to'))
			->filterCloseDate($request->input('filter_close_date_from'),$request->input('filter_close_date_to'))
			->sortable()
			->simplePaginate(30);
    	//dd(DB::getQueryLog());

		$request->flashExcept(['trade']);
		
		
		$positions=Position::whereHas('trades',
						function($query) use ($request){
							$query->filterClient($request->input('filter_client_id'))
									->filterTrader($request->input('filter_trader_id'))
									->filterUnderLying($request->input('filter_underlying'));
						}
					)->orderBy('id','desc')->get();
	
		if($request->ajax()){
			return response()->json($trades);
		}else {
			//return response()->json($trades);
			
			return view('admin.trades.index')
				->with('trades', $trades)
				->with('traders', TradingAccount::where('account_type', TradingAccount::TRADER)->orderBy('account_name', 'asc')->get())
				->with('clients', TradingAccount::where('account_type', TradingAccount::CLIENT)->orderBy('account_name', 'asc')->get())
				->with('trade_types', Trade::TRADE_TPYES)
				->with('asset_classes', Trade::ASSET_CLASSES)
				->with('trade_actions', Trade::ACTIONS)
				->with('option_types', Trade::OPTION_TYPES)
				->with('tactics', Tactic::where('id', '>', 0)->orderBy('name', 'asc')->get())
				->with('positions', $positions);
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.trades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Trade::create($requestData);

        Session::flash('flash_message', 'Trade added!');

        return redirect('admin/trades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $trade = Trade::findOrFail($id);

        return view('admin.trades.show', compact('trade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $trade = Trade::findOrFail($id);

        return view('admin.trades.edit', compact('trade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $trade = Trade::findOrFail($id);
        $trade->update($requestData);

        Session::flash('flash_message', 'Trade updated!');

        return redirect('admin/trades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Trade::destroy($id);

        Session::flash('flash_message', 'Trade deleted!');

        return redirect('admin/trades');
    }
}
