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

Route::view('/', 'welcome')->middleware('guest');
Route::get('/auth', 'AuthController@auth')->middleware('guest')->name('login');
Route::get('/callback', 'AuthController@callback')->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::post('/dashboard', 'DashboardController@bet');
    Route::post('/dashboard/search', 'DashboardController@search');
    Route::get('/user/{user}', 'DashboardController@user');
    //Route::get('/leaderboard', 'DashboardController@leaderboard');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect('/');
    });
});