<?php

use Illuminate\Support\Facades\Route;

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

Route::get('setting', 'SettingController@index');

Route::get('/history', function () {
    return view('history');
});


Route::get('/play', 'PlayController@play');
//Route::get('/setting', 'SettingController');

Route::resource('/ball', 'BallController');
Route::resource('/box', 'BoxController');
Route::resource('/input', 'InputController');
Route::resource('/setting', 'SettingController');
