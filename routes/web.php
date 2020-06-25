<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::view('/', 'welcome');
Route::view('dashboard', 'DashboardController@index');
Route::group(['middleware' => 'auth', 'prefix' => 'xpanel'], function() {
    Route::get('/', 'DashboardController@index');
    Route::resource('article', 'ArticleController')->parameters(['article'=>'content']);
    Route::resource('product', 'ArticleController')->parameters(['product'=>'content']);
    
    Route::group(['prefix' => 'master'], function () {
      Route::get('/pengguna', 'PenggunaController@index');
      Route::get('/supplier', 'EntityController@supplier');
      Route::get('/customer', 'EntityController@customer');
    });

    Route::post('upload','UploadController@index');
});