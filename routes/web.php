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


Route::get('weather', ['as' => 'weather', 'uses' => 'App\Http\Controllers\MainController@index']);
Route::post('weather/parse', 'App\Http\Controllers\MainController@parse');
Route::get('weather/{field}/{value}', ['as' => 'weather/{field}/{value}', 'uses' => 'App\Http\Controllers\MainController@weather']);
