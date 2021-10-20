<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CircleController extends Controller
{
    public function index()
    {
        return view('page.circle.index');
    }

    public function createInput(Request $request)
    {
        return view('page.circle.create.index');
    }

    public function createSave(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $circleName = $request->input('circleName');
        $circlePath = $request->input('circlePath');

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
            $newCircle->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $messages['SQL'] = 'データベースエラー';
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
