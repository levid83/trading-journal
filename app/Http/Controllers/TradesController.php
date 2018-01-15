<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\My\Classes\TradeFilters;
use App\My\Repositories\Contracts\TradeRepositoryInterface;
use App\My\Models\Position;
use App\My\Models\Trade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Session;

class TradesController extends Controller
{
	
	/**
	 * @var TradeRepositoryInterface
	 */
	private $tradeRepo;
	
	/**
	 * TradesController constructor.
	 *
	 * @param TradeRepositoryInterface $tradeRepo
	 */
	
	function __construct(TradeRepositoryInterface $tradeRepo) {
		$this->tradeRepo=$tradeRepo;
	}
	
	private function updateTactics($tacticId, Array $trades){
		if (!empty($trades) && $tacticId>0){
			foreach ($trades as $id=>$item){
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
			foreach ($trades as $id=>$item){
				$trade=Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->tactic_id = null;
					$trade->save();
				}
			}
		}
	}
	
	private function createPosition(){
		//@todo set the position params
		$position=new Position();
		$position->counter=1;
		$position->name='';
		$position->save();
		return $position;
	}
	
	private function addNewPosition(Array $trades){
		if (!empty($trades)){
			
			$position=$this->createPosition();
			foreach ($trades as $id=>$item){
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
			foreach ($trades as $id=>$item){
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
			foreach ($trades as $id=>$item){
				$trade=Trade::find($id);
				if (Auth::user()->can('update',$trade)) {
					$trade->position_id = null;
					$trade->save();
				}
			}
		}
	}
	private function updateTrades(Request $request){
		//if(Gate::allows('edit_trades')) {
			if ($request->has('add_tactic') && isset($request->tactic_id)) {
				$this->updateTactics($request->tactic_id, $request->trade);
				
				Session::flash('success', 'Tactic successfully updated.');
			}
			if ($request->has('remove_tactic')) {
				$this->removeTactics($request->trade);
				
				Session::flash('success', 'Tactic successfully removed.');
			}
			
			if ($request->has('add_new_position')) {
				$this->addNewPosition($request->trade);
				
				Session::flash('success', 'New position successfully created.');
			}
			
			if ($request->has('add_to_position') && isset($request->position_id)) {
				$this->updatePositions($request->position_id, $request->trade);
				
				Session::flash('success', 'Position successfully updated.');
			}
			
			if ($request->has('remove_position')) {
				$this->removePositions($request->trade);
				Session::flash('success', 'Position successfully removed.');
			}
		//}else{
		//	Session::flash("error","You have no permission to update these trades");
		//}
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(TradeFilters $filters, Request $request)
    {

		$trades=$this->tradeRepo->search($filters)
								->sortable()
								->paginate(30);
			
		$request->flashExcept(['trade']);
		
		if($request->ajax()){
			return response()->json(
				[
					'trades'=>	$trades,
					'traders'=>	$this->tradeRepo->traders(),
					'clients'=>	$this->tradeRepo->clients(),
					'trade_types' => $this->tradeRepo->tradeTypes(),
					'asset_classes' => $this->tradeRepo->assetClasses(),
					'trade_actions' => $this->tradeRepo->actions(),
					'option_types' => $this->tradeRepo->optionTypes(),
					'tactics' => $this->tradeRepo->tactics(),
					'positions' => $this->tradeRepo->positions($filters),
				]
			);
		}else {
			return view('admin.trades.index')
				->with('trades', $trades)
				->with('traders', $this->tradeRepo->traders())
				->with('clients', $this->tradeRepo->clients())
				->with('trade_types', $this->tradeRepo->tradeTypes())
				->with('asset_classes', $this->tradeRepo->assetClasses())
				->with('trade_actions', $this->tradeRepo->actions())
				->with('option_types', $this->tradeRepo->optionTypes())
				->with('tactics', $this->tradeRepo->tactics())
				->with('positions', $this->tradeRepo->positions($filters))
				->with('vue_js',false);
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
    public function update($id,Request $request )
	{
	
		if (!empty($request->trade)) $this->updateTrades($request);
		
		if ($id > 0) {
			$trade = Trade::findOrFail($id);
			if ($request->has('position_id')) {
				if ($request->position_id=='new') {
					$trade->position_id = ($position=$this->createPosition())->id;
				}else{
					$trade->position_id = $request->position_id;
				}
			}
			if ($request->has('tactic_id')){
				$trade->tactic_id = $request->tactic_id;
			}

			$trade->save();
			
			if (isset($position)){
				$position->generateName();
				$position->save();
			}
		
			if ($request->ajax()) {
				return response()->json(['success' => 1, 'message' => 'Trade successfully updated']);
			} else {
				Session::flash('flash_message', 'Trade updated!');
			}
		}
		if (!$request->ajax()) {
			return redirect()->back();
		}
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
