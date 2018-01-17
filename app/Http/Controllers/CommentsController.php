<?php

namespace App\Http\Controllers;

use App\My\Models\Comment;
use App\My\Models\Position;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$comments=Comment::all();
		
		if ($request->ajax()){
			return response()->json(['comments'=>$comments]);
		}else{
			return view('admin.comments.index')->with('comments',$comments);
		}
    }
	
	/**
	 * get comments by position id
	 *
	 * @param \Illuminate\Http\Request $request
	 */
    public function position(Request $request, $position_id){
		$comments=[];

		if ($position_id){
			$comments=Position::find($position_id)->comments;
		}
		if ($request->ajax()){
			return response()->json(['comments'=>$comments]);
		}else{
			return view('admin.comments.position')->with('comments',$comments);
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
        if($request->has('position_id') && $request->has('comment')) {
			$comment = new Comment(['body' => $request->comment]);
			Position::find($request->position_id)->comments()->save($comment);
	
			if ($request->ajax()) {
				return redirect()->action(
					'CommentsController@position', ['position_id' => $request->position_id]
				);
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
