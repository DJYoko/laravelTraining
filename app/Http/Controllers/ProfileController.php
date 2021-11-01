<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function detail()
    {
        return view('page.profile.index');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $newName = $request->input('userName');
        $thumbnailPath = '';

        if ($file = $request->profileImage) {
            $imageExtension = $request->file('profileImage')->extension();
            $thumbnailPath = strval($user->id) . '_' .time() . '.' . $imageExtension;
            $storagePath = public_path('/uploads/userProfile/');
            $file->move($storagePath, $thumbnailPath);
        }

        if (!is_null($newName)) {
            DB::beginTransaction();
            try {
                $user->name =$newName;
                $user->thumbnail_path =$thumbnailPath;
                $user->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(
                    [
                        'result' => 'error',
                        'message' => 'HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR',
                    ],
                    config('constants.HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR')
                );
            }
        }
        return view('page.profile.index');
    }
}
