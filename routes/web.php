<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'PageController@home');
Route::view('coba', 'coba');
Route::view('checkout', 'checkout');
Route::post('order', 'CoreController@order');
Route::get('product', 'PageController@product');
Route::get('product/detail/{slug}', 'PublicPage\ArticleController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'xpanel'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    Route::resource('article', 'ArticleController')->parameters(['article'=>'content']);
    Route::resource('product', 'ArticleController')->parameters(['product'=>'content']);
    Route::resource('category-article', 'CategoryController')->parameters(['category-article'=>'category']);
    Route::resource('category-product', 'CategoryController')->parameters(['category-product'=>'category']);
    
    Route::group(['prefix' => 'master'], function () {
      Route::get('/pengguna', 'PenggunaController@index');
      Route::get('/supplier', 'EntityController@supplier');
      Route::get('/customer', 'EntityController@customer');
    });
    
    Route::group(['prefix' => 'setting'], function () {
        Route::view('company-profile', 'admin.setting.company_profile');
    });
    Route::post('upload','UploadController@index');
});