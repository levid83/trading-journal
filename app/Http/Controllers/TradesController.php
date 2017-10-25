<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\My\Models\Tactic;
use App\My\Models\Trade;
use Illuminate\Http\Request;
use Session;
use DB;

class TradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
		$trades = Trade::with('tactic')
			->with('position')
			->filterUnderlying($request->input('underlying'))
			->filterPosition($request->input('position_id'))
			->filterTactic($request->input('tactic_id'))
			->filterStatus($request->input('status'))
			->filterAssetClass($request->input('asset_class'))
			->filterAction($request->input('action'))
			->filterStrike($request->input('strike'))
			->filterPutCall($request->input('put_call'))
			->filterExpiry($request->input('expiration_from'),$request->input('expiration_to'))
			->filterOpenDate($request->input('open_date_from'),$request->input('open_date_to'))
			->filterCloseDate($request->input('close_date_from'),$request->input('close_date_to'))
			->sortable()->paginate(50);
   
		$request->flash();
		
        return view('admin.trades.index')
			->with('trades',$trades)
			->with('trade_types',Trade::TRADE_TPYES)
			->with('asset_classes',Trade::ASSET_CLASSES)
			->with('trade_actions',Trade::ACTIONS)
			->with('option_types',Trade::OPTION_TYPES)
			->with('tactics',Tactic::all())
			;
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
