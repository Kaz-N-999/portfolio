<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view ('welcome');
});

Route::get('/dashboard', function () {
    return view('info');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//登録画面（初期画面）
Route::get('/info', function () {
    return view('info');
})->middleware('auth');

//Google map の表示
Route::get('/map','App\Http\Controllers\MarkerController@index')->middleware('auth');
//マーカーの登録
Route::post('/marker','App\Http\Controllers\MarkerController@make_marker')->middleware('auth');
//マーカーの削除
Route::get('/delete_markers','App\Http\Controllers\MarkerController@delete_markers')->middleware('auth');

//登録ログ表示
Route::get('/list', 'App\Http\Controllers\ListController@read')->middleware('auth');
//新規作成
Route::post('/create', 'App\Http\Controllers\ListController@create')->middleware('auth');
//削除機能
Route::post('/destroy{id}', 'App\Http\Controllers\ListController@destroy')->name('destroy')->middleware('auth');

//入力フォームページ
Route::get('/contact', 'App\Http\Controllers\ContactsController@index')->name('contact')->middleware('auth');
//送信完了ページ
Route::post('/finish', 'App\Http\Controllers\ContactsController@send')->middleware('auth');