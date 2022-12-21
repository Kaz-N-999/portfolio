<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //アップロードするためにデータベース接続
    public function upload(Request $request)
    {
        $img = $request->image->store('public');
        DB::table('file_path')->create([
            'file_path' => $img
        ]);
        return view('index');
    }
}
