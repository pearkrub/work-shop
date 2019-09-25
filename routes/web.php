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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout')->name('adminLogout');
    Route::namespace('Admin')->middleware('auth')->group(
        function () {
            Route::group(['as' => 'admin.'], function () {
                Route::get('/', [
                    'as' => 'dashboard.index',
                    'uses' => 'DashboardController@index'
                ]);
                Route::get('/dashboard', [
                    'as' => 'dashboard.index',
                    'uses' => 'DashboardController@index'
                ]);
            });
        });
});
