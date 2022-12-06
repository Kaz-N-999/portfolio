<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\trip;

class ListController extends Controller
{
    //データベースから値を取得
    public function read()
    {
        $items = DB::select('select * from report');
        return view('/list', ['items' => $items]);
    }

    //データベースに新規登録
    public function create(Request $request)
    {
        //画像の保存
        $dir = 'user';
        //インスタンス生成
        $trip = new trip();
        // アップロードされたファイル名を取得
        $file_name = $request->file('img')->getClientOriginalName();
        //ディレクトリに保存
        $request->file('img')->storeAs('public/' . $dir, $file_name);

        //データベースに値を挿入
        //インスタンスを生成
        $trip = new trip();
        //画像パスを保存
        $trip->img_name = $file_name;
        $trip->path = 'storage/' . $dir . '/' . $file_name;
        //テキストデータ
        $trip->prefecture = $request->prefecture;
        $trip->city = $request->city;
        $trip->comment = $request->comment;
        $trip->save();

        // 登録画面に戻る
        return view('info')->with([]);
    }

    //データベースから特定のIDのレコードを削除
    public function destroy($id)
    {
        //インスタンス生成
        $trip = new trip();
        // 指定されたIDのレコードを削除
        $trip->deleteBookById($id);
        // 削除したらデータを取得したら一覧画面に戻る
        $items = DB::select('select * from report');
        return view('/list', ['items' => $items]);
    }
}