<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\My\Models\Trade;
use Illuminate\Http\Request;
use Session;

class TradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $trades = Trade::sortable()->paginate($perPage);
        } else {
            $trades = Trade::sortable()->paginate($perPage);
        }

        return view('admin.trades.index', compact('trades'));
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
