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

Route::get('/play', function () {
    return view('play');
});

Route::post('/updategame/{id}', 'SettingController@updategame')->name('updategame');
Route::get('/settings', 'SettingController@index');
Route::get('/history', 'InputController@index');
Route::get('/playgame', 'PlayController@play')->name('playgame');
Route::get('/play', 'PlayController@updatePlay');
Route::get('/distribute', 'PlayController@distribute')->name('distribute');

Route::resource('/ball', 'BallController');
Route::resource('/box', 'BoxController');
Route::resource('/input', 'InputController');
Route::resource('/setting', 'SettingController');
Route::resource('/color', 'ColorController');
