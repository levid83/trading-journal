<?php

namespace App\Http\Controllers;

use App\My\Models\Position;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
			$positions=Position::whereHas('trades',
				function($query) use ($request){
					/*$query->filterClient($request->input('filter_client_id'))
						->filterTrader($request->input('filter_trader_id'))
						->filterUnderLying($request->input('filter_underlying'));*/
				}
			)->orderBy('id','desc')->get();
		if ($request->ajax()){
			return response()->json($positions);
		}
		return ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\My\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\My\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\My\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\My\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
