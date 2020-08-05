<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('masuk', 'CoreController@login_member');
Route::view('reset-password', 'reset_password');
Route::post('reset-password', 'CoreController@reset_password');

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'PageController@home');
Route::view('coba', 'coba');
Route::view('checkout', 'checkout');
Route::view('promo', 'promo');
Route::view('terms-conditions', 'terms_conditions');
Route::view('how-to-shop', 'how_to_shop');
Route::view('tentang-kami', 'tentang_kami');
Route::view('kontak-kami', 'kontak_kami');
Route::post('order', 'CoreController@order');
Route::get('verify/{username}/{password}', 'CoreController@verify');

Route::get('product', 'PageController@product');
Route::get('website', 'PageController@product');
Route::get('seo', 'PageController@product');
Route::get('design', 'PageController@product');
Route::get('application', 'PageController@product');
Route::get('article', 'PageController@product');
Route::view('order-sukses', 'order_sukses');
Route::get('product/detail/{slug}', 'PublicPage\ArticleController@index');
Route::get('article/detail/{slug}', 'PublicPage\ArticleController@index');


Route::group(['middleware' => ['auth']], function () {
  Route::view('pengaturan', 'pengaturan');
  Route::post('pengaturan', 'CoreController@pengaturan');
  Route::get('new-password/{username}/{id}', 'CoreController@new_password');
  Route::post('new-password/{username}/{id}', 'CoreController@create_new_password');
 
  Route::post('order-proses/{proses}/{id}', 'CoreController@order_proses');
  Route::get('history-order', 'CoreController@history_order');
  Route::post('confirmation-order/{id}', 'CoreController@confirmation_order');
 
});

Route::group(['middleware' => ['auth' , 'CekAdmin'], 'prefix' => 'xpanel'], function() {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    Route::resource('article', 'ArticleController')->parameters(['article'=>'content']);
    Route::resource('product', 'ArticleController')->parameters(['product'=>'content']);
    Route::resource('category-article', 'CategoryController')->parameters(['category-article'=>'category']);
    Route::resource('category-product', 'CategoryController')->parameters(['category-product'=>'category']);
    Route::resource('order-product', 'Xpanel\OrderController')->parameters(['order-product'=>'order']);
    

    Route::group(['prefix' => 'master'], function () {
      Route::get('/pengguna', 'PenggunaController@index');
      Route::get('/supplier', 'EntityController@supplier');
      Route::get('/customer', 'EntityController@customer');
    });
    
    Route::group(['prefix' => 'setting'], function () {
        Route::get('company-profile', 'CoreController@company_profile');
        Route::post('company-profile', 'CoreController@company_profile_store');
    });
    Route::post('upload','UploadController@index');
});