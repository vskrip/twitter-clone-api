<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::prefix('/auth')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
});

// Twitts
// Route::group(['middleware' => 'auth:api'], function () {
Route::get('twitts', 'TwittController@index');
Route::get('twitts/{twitt}', 'TwittController@show');
Route::get('twitts/latest/{id}', 'TwittController@getLatestTwitts');
Route::post('twitts', 'TwittController@store');
Route::put('twitts/{twitt}', 'TwittController@update');
Route::delete('twitts/{twitt}', 'TwittController@delete');
// });
