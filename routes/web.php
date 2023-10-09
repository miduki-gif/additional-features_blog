<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//上記の書き方をすることでララベルの組み込みサーバーを動かすコマンドを入力した際に
//ララベルのデフォルトページが表示されていた

// Route::get('/', function () {
//     return view('welcome');
// });

//ブログ一覧画面を表示するルーティング定義
//ルーティングには名前を付けることができる
//ルーティングではファイルがある場所のパスを書く必要がある

Route::get('/', 'App\Http\Controllers\OriginalBlogController@showList')->name('OriginalBlogs');
