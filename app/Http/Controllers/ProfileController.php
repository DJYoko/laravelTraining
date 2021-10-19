<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function detail(){
        return view('page.profile.index');
    }

    public function edit(Request $request)
    {
        $newName = $request->input('userName');
        if (!is_null($newName)){
            $user = Auth::user();
            DB::beginTransaction();
            try {
                $user->name =$newName;
                $user->save();
                DB::commit();
            } catch ( \Exception $e ) {
                DB::rollBack();
                return response()->json( [
                        'result' => 'error',
                        'message' => 'HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR',
                    ], config( 'constants.HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR' )
                );
            }
        }
        return view('page.profile.index');
    }

}
