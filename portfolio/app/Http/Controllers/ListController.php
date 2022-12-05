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

    public function create(Request $request)
    {
        //画像の保存
        $dir = 'user';
        // アップロードされたファイル名を取得
        $file_name = $request->file('img')->getClientOriginalName();
        //ディレクトリに保存
        $request->file('img')->storeAs('public/' . $dir, $file_name);


        //データベースに値を挿入
        //インスタンスを生成
        $trip = new trip();
        //画像パス
        $trip->img_name = $file_name;
        $trip->path = 'storage/' . $dir . '/' . $file_name;
        //テキストデータ
        $trip->prefecture = $request->prefecture;
        $trip->city = $request->city;
        $trip->comment = $request->comment;
        $trip->save();

        // 変数をビューに渡す
        return view('info')->with([
        ]);

    }
}