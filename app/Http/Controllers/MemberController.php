<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Circle;

class MemberController extends Controller
{
  public function updateInput()
  {
    return view('page.member.index');
  }

  public function showMemberDetail(int $userId)
  {
    $displayUser = User::where('id', $userId)->first();

    // no matched User
    if (is_null($displayUser)) {
      abort(404);
    }

    $operatingUser = Auth::user();

    $thumbnailPath = null;
    if (isset($operatingUser->thumbnail_path)) {
      $thumbnailPath = config('constants.MEMBER_IMAGE_STORAGE_DIRECTORY') . $operatingUser->thumbnail_path;
    }

    // Circles that the target User takes part in.
    $targetCircles = Circle::orderBy('circles.created_at', 'desc')
      ->join('circle_members', 'circles.id', '=', 'circle_members.circle_id')
      ->where('circle_members.user_id', $userId)
      ->select('circles.id', 'circles.name', 'circles.path', 'circles.thumbnail_path')
      ->get();

    return view('page.member.detail.index', [
      'userName' => $displayUser->name,
      'thumbnailPath' => $thumbnailPath,
      'isOwner' => $operatingUser->id === $userId,
      'targetCircles' => $targetCircles
    ]);
  }

  public function updateSave(Request $request)
  {
    $user = Auth::user();
    $newName = $request->input('userName');
    $thumbnailPath = $user->thumbnail_path;
    if (!is_null($request->memberImage)) {
      $theFile = $request->memberImage;
      $imageExtension = $request->file('memberImage')->extension();
      $thumbnailPath = strval($user->id) . '_' . time() . '.' . $imageExtension;
      $storagePath = public_path(config('constants.MEMBER_IMAGE_STORAGE_DIRECTORY'));
      $theFile->move($storagePath, $thumbnailPath);
    }

    if (!is_null($newName)) {
      DB::beginTransaction();
      try {
        $user->name = $newName;
        $user->thumbnail_path = $thumbnailPath;
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
