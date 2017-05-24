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

Route::group(['prefix' => 'users/', 'middleware' => 'web'], function() {
    Route::get('show', ['as' => 'users', 'uses' => 'UsersController@showUsers']);
    Route::get('find', ['as' => 'findUsers', 'uses' => 'UsersController@findUsers']);
    Route::get('add/{id}', ['as' => 'sendingRequest', 'uses' => 'UsersController@sendingRequest'])->where(['id' => '[0-9]+']);
    Route::get('accept/{id}', ['as' => 'acceptRequest', 'uses' => 'UsersController@acceptRequest'])->where(['id' => '[0-9]+']);
    Route::get('decline/{id}', ['as' => 'declineRequest', 'uses' => 'UsersController@declineRequest'])->where(['id' => '[0-9]+']);
    Route::get('delete/{id}', ['as' => 'deleteFriend', 'uses' => 'UsersController@deleteFriend'])->where(['id' => '[0-9]+']);
});

Route::get('/albums', ['uses' => 'AlbumsController@action', 'as' => 'albums'])->middleware('auth');

Route::get('/album/1', ['uses' => 'AlbumController@action'])->middleware('auth');

Route::get('/friends', ['uses' => 'FriendsController@action', 'as' => 'friends'])->middleware('auth');

Route::get('/messages', ['uses' => 'MessagesController@action', 'as' => 'messages'])->middleware('auth');
