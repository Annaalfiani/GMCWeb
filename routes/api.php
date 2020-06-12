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

Route::get('film', 'v1\FilmController@film');
Route::get('film/nowplaying', 'v1\FilmController@filmnowplaying');
Route::get('film/comingsoon', 'v1\FilmController@filmcomingsoon');
Route::get('film/{id}/jadwaltayang', 'v1\JadwalTayangController@jadwal');

Route::post('order', 'v1\OrderController@order');

Route::post('login', 'v1\Auth\LoginController@login');
Route::post('register', 'v1\Auth\RegisterController@register');
