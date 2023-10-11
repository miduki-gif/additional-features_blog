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

//ブログ投稿画面を表示
Route::get('/blog/create', 'App\Http\Controllers\OriginalBlogController@showCreate')->name('create');

//ブログ登録をする
Route::post('/blog/store', 'App\Http\Controllers\OriginalBlogController@exeStore')->name('store');

//編集ボタンをクリック時に該当IDの内容ページを表示する（詳細画面表示）
Route::get('/blog/{id}', 'App\Http\Controllers\OriginalBlogController@showDetail')->name('originalBlogs_show');

//編集ボタンをクリック時に該当IDの編集ページを表示する
Route::get('/blog/edit/{id}', 'App\Http\Controllers\OriginalBlogController@showEdit')->name('edit');

//更新ボタンをクリック時に編集したものを更新する
Route::post('/blog/update', 'App\Http\Controllers\OriginalBlogController@exeUpdate')->name('update');

//削除ボタンをクリック時に該当IDの内容ページを削除する（物理削除）
Route::post('/blog/delete/{id}', 'App\Http\Controllers\OriginalBlogController@exeDelete')->name('delete');