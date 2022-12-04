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
        //データベースに値を挿入
        $trip = new trip();
        $trip->prefecture = $request->prefecture;
        $trip->city = $request->city;
        $trip->comment = $request->comment;
        $trip->save();

        // 変数をビューに渡す
        return view('info')->with([
        ]);

    }
}