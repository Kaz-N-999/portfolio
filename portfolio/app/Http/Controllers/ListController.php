<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ListController extends Controller
{
    //データベースから値を取得
    public function read()
    {
        $user = User::find(Auth::id())->reports;
        //$user = trip::orderBy('created_at')->cursorPaginate(5);
        //5件ずつデータを表示
        //$items = $user->orderBy('created_at')->cursorPaginate(5);
            
        return view('/list', ['items' => $user]);

    }

    //データベースに新規登録
    public function create(Request $request)
    {
        //画像の保存
        $dir = Auth::id();
        //インスタンス生成
        $report = new report();
        // アップロードされたファイル名を取得
        $file_name = $request->file('img')->getClientOriginalName();
        //ディレクトリに保存
        $request->file('img')->storeAs('public/' . $dir, $file_name);

        //データベースに値を挿入
        //画像パスを保存
        $report->img_name = $file_name;
        $report->path = 'storage/' . $dir . '/' . $file_name;
        //テキストデータを保存
        $report->user_id = Auth::id();
        $report->prefecture = $request->prefecture;
        $report->city = $request->city;
        $report->comment = $request->comment;
        $report->save();

        // 登録画面に戻る
        return view('info');
    }

    //データベースから特定のIDのレコードを削除
    public function destroy($id)
    {
        //インスタンス生成
        $report = new report();
        //画像削除用のパスの設定
        $deleteimg = report::find($id);
        $d_imgname = $deleteimg->img_name;
        //画像を削除する
        Storage::disk('public')->delete(Auth::id().$d_imgname);
        // 指定されたIDのレコードを削除
        $report->deleteBookById($id);
        // 削除したらデータを取得したら一覧画面に戻る
        $items = DB::table('report')->orderBy('id')->cursorPaginate(5);
        return view('/list', ['items' => $items]);
    }
}
