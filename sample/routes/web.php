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

Route::get('/', 'PostsController@index')->name('top');
Route::get('/home', 'HomeController@index')->name('home');
// 投稿の作成、文字数制限、編集、アップデート、削除
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
// comment
Route::resource('comments', 'CommentsController', ['only' => ['store']]);
Auth::routes();
// Userlist,
Route::group(['middleware' => 'auth'], function () {
    Route::get('users', 'UsersController@index')->name('users');
    // follow、
    Route::put('/users/{user}/follow','UsersController@follow');
    // unfollow
    Route::put('/users/{user}/unfollow','UsersController@unfollow');

});
