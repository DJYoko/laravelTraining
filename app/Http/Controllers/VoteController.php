<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function home(){
        return view('page.vote.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $query = Vote::Select('*');

        //TODO
        // add keyword filter
        // add user filter
        $currentDatetime = Carbon::now();

        $query->where(function($query) use ($currentDatetime) {
            $query
                ->where(
                    // pattern 1: start & end is defined, and TODAY is between them.
                    function($query) use ($currentDatetime) {

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

        $query->orderBy('votes.updated_at', 'desc');
        $votes = $query->get();
        return response()->json( [ 'result' => 'success', 'votes' => $votes ] );
    }

    /**
     * create multiple Votes
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::User();

        // reject empty Request
        if(!isset($request->votes)){
            return response()->json( [
                'result' => 'error',
                'message' => 'HTTP_STATUS_CODE_BAD_REQUEST',
            ], config( 'constants.HTTP_STATUS_CODE_BAD_REQUEST' ) );
        }

        $newVotes = [];
        DB::beginTransaction();
        try {

            foreach($request->votes as $vote) {
                $newVote = new Vote();
                $newVote->user_id = $user->id;
                $newVote->name = $vote['name'];
                $newVote->description = $vote['description'];
                $newVote->start_at = (isset($vote['start_at'])) ? $vote['start_at'] : null;
                $newVote->end_at = (isset($vote['end_at']  )) ? $vote['end_at'] : null;
                $newVote->save();
                $newVotes[] = $newVote; // for response
            }
            DB::commit();

        } catch ( \Exception $e ) {

            DB::rollBack();
            return response()->json( [
                    'result' => 'error',
                    'message' => 'HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR',
                ], config( 'constants.HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR' )
            );

        }

        return response()->json( [
            'result' => 'success',
            'data'   => $newVotes
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!isset($request->votes)){
            return response()->json( [
                'result' => 'error',
                'message' => 'HTTP_STATUS_CODE_BAD_REQUEST',
            ], config( 'constants.HTTP_STATUS_CODE_BAD_REQUEST' ) );
        }

        $requestedVotes = $request->votes;
        $updatedVotes = [];

        DB::beginTransaction();
        try {

            foreach($requestedVotes as $requestedVote) {
                $targetVote = Vote::where('votes.id', '=', $requestedVote['id'])->first();
                if( !empty( $targetVote ) ) {

                    // in case of Update,
                    // null or empty text mean 'become NULL or empty text'
                    // isset cannot define the parameters "is not send" and "send as Null or empty".

                    if(array_key_exists( 'name', $requestedVote)) {
                        $targetVote->name =  $requestedVote['name'];
                    }
                    if(array_key_exists( 'description', $requestedVote)) {
                        $targetVote->description =  $requestedVote['description'];
                    }
                    if(array_key_exists( 'start_at', $requestedVote)) {
                        $targetVote->start_at =  $requestedVote['start_at'];
                    }
                    if(array_key_exists( 'end_at', $requestedVote)) {
                        $targetVote->end_at =  $requestedVote['end_at'];
                    }

                }
                $targetVote->save();
                $updatedVotes[] = $targetVote;
            }

            DB::commit();

        } catch ( \Exception $e ) {

            DB::rollBack();
            return response()->json( [
                    'result' => 'error',
                    'message' => 'HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR',
                ], config( 'constants.HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR' )
            );

        }

        return response()->json( [
            'result' => 'success',
            'data'   => $targetVote
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::User();
        // reject empty Request
        if(!isset($request->ids)){
            return response()->json( [
                'result' => 'error',
                'message' => 'HTTP_STATUS_CODE_BAD_REQUEST',
            ], config( 'constants.HTTP_STATUS_CODE_BAD_REQUEST' ) );
        }

        $ids = $request->ids;
        $query = Vote::whereIn('votes.id', $ids);
        $deleteTargetIds = $query->pluck('id');

        DB::beginTransaction();
        try {

            $query->delete();
            DB::commit();

        } catch ( \Exception $e ) {

            DB::rollBack();
            return response()->json( [
                    'result' => 'error',
                    'message' => 'HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR',
                ], config( 'constants.HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR' )
            );

        }

        return response()->json( [
            'result' => 'success',
            'data'   => $deleteTargetIds
        ] );
    }
}
