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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ

//トップ、タイムライン
//tweetを表示
Route::get('/top','PostsController@index'); 
//tweetをDBに登録
Route::post('/create','PostsController@tweet');
//tweetを削除
Route::post('/trash','PostsController@delete');
//tweetを編集
Route::post('/update','PostsController@update');

//プロフィール
Route::get('/profile','UsersController@profile');
//プロフィールupdate
Route::post('/profile','UsersController@profileupdate')->name('profileupdate');
//他ユーザープロフィール
Route::get('/follows/{id}','UsersController@followsprofile');
Route::post('/follows/{id}/follow', 'UsersController@follow');//他ユーザープロフィールからのフォローする
Route::post('/follows/{id}/unfollow', 'UsersController@unfollow');//他ユーザープロフィールからのフォローを外す

//検索
//一覧表示
Route::get('/search','UsersController@search');
//ユーザー検索
Route::post('/usersearch','UsersController@usersearch');
//ユーザーページのフォロー
Route::post('/usersearch/{id}/follow', 'UsersController@follow')->name('follow'); //serach.bladeのフォローするform actionを記載
//ユーザーページのフォロー解除
Route::post('/usersearch/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');


//フォロー
Route::get('/followList','FollowsController@followList');


//フォロワー
Route::get('/followerList','FollowsController@followerList');



//ログアウト
Route::get('/logout','Auth\LoginController@logout');
Route::post('/logout','Auth\LoginController@logout');

Auth::routes();

