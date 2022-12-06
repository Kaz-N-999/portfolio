<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//登録画面（初期画面）
Route::get('/', function () {
    return view('info');
});
//ログ表示
Route::get('/list', 'App\Http\Controllers\ListController@read');
//新規作成
Route::post('/create', 'App\Http\Controllers\ListController@create');
//削除機能
Route::post('/destroy{id}', 'App\Http\Controllers\ListController@destroy')->name('destroy');