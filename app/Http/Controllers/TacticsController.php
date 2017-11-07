<?php

namespace App\Http\Controllers;

use App\My\Models\Tactic;
use Illuminate\Http\Request;

class TacticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
        	return response()->json(Tactic::where('id', '>', 0)->orderBy('name', 'asc')->get());
		}else{
			return response()->json(Tactic::where('id', '>', 0)->orderBy('name', 'asc')->get());
		}
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
     * @param  \App\My\Models\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function show(Tactic $tactic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\My\Models\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function edit(Tactic $tactic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\My\Models\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tactic $tactic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\My\Models\Tactic  $tactic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tactic $tactic)
    {
        //
    }
}
