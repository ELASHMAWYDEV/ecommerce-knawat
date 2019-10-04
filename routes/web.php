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




Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::resource('users','UserController');
Route::group(['as'=>'frontEnd.','middleware'=>'web'],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/getCategories', 'HomeController@getCategories');
    Route::get('/get10Products', 'HomeController@get10Products');
    Route::get('/getProducts', 'HomeController@getProducts');
    Route::get('/getProductBySku/{sku}', 'HomeController@getProductBySku');
    //the product page
    Route::get('/products', 'HomeController@products')->name('products');
    Route::get('/products/{sku}', 'HomeController@productDetails')->name('productDetails');
    //the  lang status 
    Route::get('/lang/{lang}','HomeController@setLang')->name('setLang');
    //register new user
    Route::post('/users/store','UserController@store')->name('users.store');
});

Route::get('json-api', 'ApiController@index');


Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
  // in the admin controler 
  Route::post('/updateSiteSettings','AdminController@updateSiteSettings')->name('updateSiteSettings');

});


