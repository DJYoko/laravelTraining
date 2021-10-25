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
        return view('welcome');
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

        // $myCircles = CircleMember::where('user_id', $user->id)->get();
        // 自分が属しているサークルを検出する
        // - role を見てオーナーかどうかでグループまたはソートする
        // SELECT
        // circles.*, circle_members.user_id, circle_members.role AS member_user_id
        // FROM
        //     circles
        //         INNER JOIN
        //     circle_members ON circle_members.circle_id = circles.id
        // WHERE
        //     circle_members.user_id = 1;

        return view('page.home.index');
    }
}
