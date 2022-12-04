<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    //データベースから値を取得
    public function read(){
        $items = DB::select('select * from report');
        return view('/list',['items' => $items]);
    }
}
