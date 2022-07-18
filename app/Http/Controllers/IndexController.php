<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Models\CircleMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
  public function topIndex()
  {
    $allCircles = Circle::orderBy('created_at', 'desc')->get();
    return view('index', [
      'circles' => $allCircles,
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function home()
  {
    $user = Auth::user();
    $userId = $user->id;

    // 自分の参加しているサークル
    $myCircles = Circle::orderBy('created_at', 'desc')
      ->join('circle_members', 'circles.id', '=', 'circle_members.circle_id')
      ->where('circle_members.user_id', $userId)
      ->select('circles.*')
      ->get();

    $params = [];
    $params['myCircles'] = $myCircles;

    return view('page.home.index', $params);
  }
}
