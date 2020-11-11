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
Route::get('film/{id}', 'v1\FilmController@show');
Route::group(['prefix' => 'v2'], function(){
    Route::get('film/{id}/schedulle', 'v2\SchedulleController@schedulle'); 
    Route::get('schedulle/{dateId}/{studioId}/hours', 'v2\SchedulleController@timeByDate');
    Route::get('schedulle/{id}/studio', 'v2\SchedulleController@studio');
});


Route::get('film/{id}/jadwaltayang', 'v1\JadwalTayangController@jadwal');


Route::post('seat/available', 'v1\KursiController@available');

Route::post('order', 'v1\OrderController@order');
Route::get('order/show', 'v1\OrderController@myOrders');
Route::get('check/ticket/{id}','v1\OrderController@checkTicket');

Route::post('snap', 'v1\OrderController@snapToken');
Route::post('snap/charge', 'v1\OrderController@snapToken');


Route::post('login', 'v1\Auth\LoginController@login');
Route::post('register', 'v1\Auth\RegisterController@register');
Route::get('profil', 'v1\CustomerController@profil');
Route::post('profil/update', 'v1\CustomerController@update');
Route::get('email/verify/{id}', 'v1\Auth\VerificationController@verify')->name('api.verification.verify');