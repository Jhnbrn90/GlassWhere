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

Route::get('start', 'GlassWareController@index');

Route::get('glassware/{lab}/{type}', 'GlassWareController@show');

Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@store');
Route::get('logout', 'LoginController@destroy');

Route::post('reset', 'GlassWareController@reset');

Route::get('download', 'GlassWareController@download');

/**
 * API Routes
 */

Route::get('api/glassware/{glassware}', 'ApiController@show');
Route::post('api/glassware/{glassware}', 'ApiController@store');
