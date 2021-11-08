<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function updateInput()
    {
        return view('page.member.index');
    }

    public function updateSave(Request $request)
    {
        $user = Auth::user();
        $newName = $request->input('userName');
        $thumbnailPath = $user->thumbnail_path;
        if (!is_null($request->memberImage)) {
            $theFile = $request->memberImage;
            $imageExtension = $request->file('memberImage')->extension();
            $thumbnailPath = strval($user->id) . '_' .time() . '.' . $imageExtension;
            $storagePath = public_path(config('constants.MEMBER_IMAGE_STORAGE_DIRECTORY'));
            $theFile->move($storagePath, $thumbnailPath);
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
        return view('page.member.index');
    }
}
