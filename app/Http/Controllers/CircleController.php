<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Circle;
use App\Models\CircleMember;
use App\Models\User;
use App\Enum\CircleMemberRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CircleController extends Controller
{
    public function index()
    {
        $allCircles = Circle::orderBy('created_at', 'desc')->get();
        return view('page.circle.index', [
            'circles' => $allCircles,
        ]);
    }

    public function createInput(Request $request)
    {
        return view('page.circle.create.index');
    }

    public function circleDetail($circlePath, Request $request)
    {
        $params = [];
        $theCircle = Circle::where('circles.path', '=', $circlePath)->first();
        if (is_null($theCircle)) {
            return  response()->view('page.error.404', $params, 404);
        }
        $params['circle'] = $theCircle;
        $circleId =  $theCircle->id;

        // メンバー取得
        $theCircleMembers = User::Join('circle_members', 'circle_members.user_id', '=', 'users.id')
            ->select('*')
            ->where('circle_members.circle_id', '=', $circleId)
            ->get();
        $params['members'] = $theCircleMembers;

        // 自分が編集権限を持っているサークルであるかどうかを確認してビューに渡す
        $params['isEditable'] = false;

        // ログインしていなければスルー
        $user = Auth::user();
        if (!is_null($user)) {
            $userId = $user->id;
            //$circleId
            $params['isEditable'] = CircleMember::isEditable($circleId, $userId);
        }

        return view('page.circle.detail.index', $params);
    }


    public function createSave(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $circleName = $request->input('circleName');
        $circlePath = $request->input('circlePath');
        $circleDescription = !empty($request->input('circleDescription')) ? $request->input('circleDescription') : '';

        $messages = [];
        if (!isset($circleName)) {
            $messages['circleName'] = '名前を入力してください';
        }
        if (!isset($circlePath)) {
            $messages['circlePath'] = 'URLを入力してください';
        }

        // ほかにバリデーション項目があればここに加筆

        DB::beginTransaction();
        try {
            // TODO 登録処理
            $newCircle = new Circle();
            $newCircle->name  = $circleName;
            $newCircle->path = $circlePath;
            $newCircle->create_user_id = $userId;
            $newCircle->thumbnail_path = ''; //TODO あとでやる
            $newCircle->description = $circleDescription;
            $newCircle->save();

            // 新設したサークルに、作成ユーザーをメンバーとして登録
            $newCircleId = $newCircle->id;
            $newCircleMember = new CircleMember();
            $newCircleMember->user_id = $userId;
            $newCircleMember->circle_id = $newCircleId;
            $newCircleMember->role = CircleMemberRole::OWNER();

            // TODO role 割り当て
            $newCircleMember->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $messages['SQL'] = $e;
        }

        // バリデーション停職時、エラーメッセージをつけて入力画面を再表示
        if (!empty($messages)) {
            return view('page.circle.create.index', [
                'messages' => $messages
            ]);
        }

        return view('page.circle.create.complete');
    }
}
