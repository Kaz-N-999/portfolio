<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MarkerController extends Controller
{
    public function index()
    {
        //データを取得
        $markers = User::find(Auth::id())->markers;
        // 登録画面に戻る
        return view('map',['markers' => $markers]);
    }


    //データベースにマーカーの座標を新規登録
    public function make_marker(Request $request)
    {
        //dd($request->lng);
        //インスタンス生成
        $marker = new marker();

        //user_idを保存
        $marker->user_id = Auth::id();

        //座標をを保存
        $marker->lat = $request->lat;
        $marker->lng = $request->lng;
        $marker->save();

        // 二重送信防止
        $request->session()->regenerateToken();

        //データを取得
        $markers = User::find(Auth::id())->markers;

//      $markers->StringToNumber($markers);
//      $number = (float) $markers;

        // 登録画面に戻る
        return view('map', ['markers' => $markers]);
    }
}
