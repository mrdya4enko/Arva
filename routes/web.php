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
Auth::routes();

Route::get('/', ['uses' => 'HomeController@action', 'as' => 'home'])->middleware('auth');

Route::get('/logout', ['uses' => 'LogoutController@action', 'as' => 'logout'])->middleware('auth');

Route::match(['get', 'post'], '/settings', ['uses' => 'SettingsController@action', 'as' => 'settings'])->middleware('auth');

Route::get('/news', ['uses' => 'NewsController@action', 'as' => 'news'])->middleware('auth');

Route::get('/users', ['uses' => 'UsersController@action', 'as' => 'users'])->middleware('auth');

Route::get('/albums', ['uses' => 'AlbumsController@action', 'as' => 'albums'])->middleware('auth');
Route::get('/album/1', ['uses' => 'AlbumController@action'])->middleware('auth');

Route::get('/friends', ['uses' => 'FriendsController@action', 'as' => 'friends'])->middleware('auth');

Route::get('/messages', ['uses' => 'MessagesController@action', 'as' => 'messages'])->middleware('auth');
