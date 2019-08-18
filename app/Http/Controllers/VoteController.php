<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Carbon\Carbon;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Vote::Select('*');

        //TODO
        // add keyword filter
        // add user filter

        $query->where(function($query){
            $query
                ->where(
                    // pattern 1: start & end is defined, and TODAY is between them.
                    function($query){
                        $currentDatetime = Carbon::now();
                        $query->where( 'votes.start_at', '<=', $currentDatetime );
                        $query->where( 'votes.end_at',   '>=', $currentDatetime );
                    }
                )->orWhere(
                    function($query) {
                        // pattern 2 : start & end is not defined
                        $query->whereNull( 'votes.start_at');
                        $query->whereNull( 'votes.end_at');
                    }
                );
        });

        $votes = $query->get();
        return response()->json( [ "result" => "success", "votes" => $votes ] );
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
