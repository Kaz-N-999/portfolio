<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index () 
    {
        $e_message="都道府県が選択されていません";
        return view('info', ['e_message' => $e_message]);
    }

}