<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactsSendmail;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    //
    public function index()
    {
        //ユーザのメール情報を取得
        //$email = Auth::email();
        //$user_name = Auth::name();
        //return view('/contacts', ['email' => $email]);

        return view('/contacts');
    }

    public function send(Request $request)
{
    // バリデーション
    $request->validate([
    'title' => 'required',
    'body' => 'required'
    ]);
    // inputの値を取得,emailはログイン時に使用しているものを取得
    $email = Auth::user()->email;
    $title = $request->title;
    $body = $request->body;

        // 送信ボタンの場合、送信処理

        // メールを送信
        Mail::send(new ContactsSendmail($email,$title,$body));

        // 二重送信対策のためトークンを再発行
        $request->session()->regenerateToken();

        // 送信完了ページのviewを表示
        return view('/finish',['title' => $title, 'body' => $body]);
}
}
