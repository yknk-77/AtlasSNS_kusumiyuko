<?php

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
  return view('welcome');
});

// Auth認証
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ アクセス制限
Route::group(['middleware' => 'auth'], function () {

  // トップ画面
  Route::get('/top', 'PostsController@index');

  // プロフィール画面表示
  Route::get('/profile', 'UsersController@show');
  //プロフィール編集
  Route::put('/profile', 'UsersController@profileUpdate');

  // 検索画面
  Route::get('/search', 'UsersController@search');

  // フォロー・フォロワー画面
  Route::get('/follow-list', 'PostsController@index');
  Route::get('/follower-list', 'PostsController@index');

  // ユーザー関連 CRUD
  Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
});
