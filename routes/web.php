<?php

use Illuminate\Support\Facades\Route;


Route::post('/finish', function(){
    return redirect()->route('welcome');
})->name('donation.finish');

Route::get('/', function () {
    return redirect()->route('admindashboard.index');
});

// Route::get('/manager', function () {
//     return view('templates.manager');
// });

Route::get('/seat', function () {
    return view('templates.seat');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('admindashboard', 'admin\DashboardController');
    Route::resource('data_film', 'admin\DataFilmController')->except(['destroy']);
    Route::get('data_film/{id}/destroy', 'admin\DataFilmController@destroy')->name('data_film.destroy');
    Route::get('data_film/{id}/studio', 'admin\DataFilmController@getStudio')->name('film.studio');

	Route::get('film/get/{id}', 'admin\DataFilmController@getOne')->name('film.get.one');



    Route::group(['prefix' => 'order'], function() {
        Route::get('/', 'admin\OrderController@index')->name('admin.order.index');
        Route::get('/create', 'admin\OrderController@create')->name('admin.order.create');
        Route::get('/get-schedulle/{id}', 'admin\OrderController@getSchedulle');
        Route::post('/get-studios', 'admin\OrderController@getStudios');
        Route::get('/get-hours/{dateId}/{studioId}', 'admin\OrderController@getHours');
        Route::get('/get-price/{dateId}', 'admin\OrderController@getPrice');
        Route::post('/get-seats', 'admin\OrderController@getSeats');
        Route::post('/store', 'admin\OrderController@order');
        Route::get('/{id}', 'admin\OrderController@delete')->name('admin.order.delete');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('jadwal_tayang', 'admin\JadwalTayangController')->except(['destroy']);
    Route::get('jadwal_tayang/{id}/destroy', 'admin\JadwalTayangController@destroy')->name('jadwal_tayang.destroy');
	Route::get('tanngal-tayang/{studio_id}', 'admin\TanggalTayangController@getByStudio')->name('get.date.studio');

    Route::resource('customer', 'admin\CustomerController');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('studio', 'admin\StudioController')->except(['show', 'destroy']);
    Route::get('studio/{id}', 'admin\StudioController@destroy')->name('studio.destroy');
});

Route::group(['prefix' => 'manager'], function () {
    Route::resource('managerdashboard', 'manager\DashboardController');
    Route::resource('penjualan_tiket', 'manager\PenjualanTiketController');
    Route::get('export-excel', 'manager\PenjualanTiketController@export')->name('export.excel');

	///Route::prefix('films')

});
//Auth Admin
Route::get('/admin-login', 'admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'admin\Auth\LoginController@login')->name('admin.login.submit');
Route::get('/admin-register', 'admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin-register', 'admin\Auth\RegisterController@store')->name('admin.register.submit');
Route::get('/admin-logout', 'admin\Auth\LoginController@logout')->name('admin.logout');

//Auth Manager
Route::get('/manager-login', 'manager\Auth\LoginController@showLoginForm')->name('manager.login');
Route::post('/manager-login', 'manager\Auth\LoginController@login')->name('manager.login.submit');
Route::get('/manager-register', 'manager\Auth\RegisterController@showRegisterForm')->name('manager.register');
Route::post('/manager-register', 'manager\Auth\RegisterController@store')->name('manager.register.submit');
Route::get('/manager-logout', 'manager\Auth\LoginController@logout')->name('manager.logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
