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

Route::get('/logout', ['uses' => 'LogoutController@action', 'as' => 'logout']);

Route::get('/settings', ['uses' => 'SettingsController@action', 'as' => 'settings']);

Route::get('/albums', ['uses' => 'AlbumsController@action', 'as' => 'albums']);
Route::get('/album/1', ['uses' => 'AlbumController@action']);

Route::get('/friends', ['uses' => 'FriendsController@action', 'as' => 'friends']);

Route::get('/messages', ['uses' => 'MessagesController@action', 'as' => 'messages']);
