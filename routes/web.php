<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::group(['prefix' => 'master'], function () {
      Route::get('/bidang-usaha', 'BidangUsahaController@index');
      Route::get('/akun-perkiraan', 'AkunPerkiraanController@index');
      Route::get('/pengguna', 'PenggunaController@index');
      Route::get('/supplier', 'EntityController@supplier');
      Route::get('/customer', 'EntityController@customer');
    });

    Route::group(['prefix' => 'proses'], function () {
        Route::get('kas-masuk', 'JurnalController@kasMasuk');
        Route::get('kas-keluar', 'JurnalController@kasKeluar');
        Route::get('jurnal-umum', 'JurnalController@jurnalUmum');
        Route::get('jurnal-koreksi', 'JurnalController@jurnalKoreksi');
    });

    
});