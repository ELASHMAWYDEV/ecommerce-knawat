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
    Route::get('/deleteProductBySku/{sku}', 'HomeController@getProductBySku');
    //the product page
    Route::get('/products', 'HomeController@products')->name('products');
    Route::get('/products/{sku}', 'HomeController@productDetails')->name('productDetails');
    //the  lang status 
    Route::get('/lang/{lang}','HomeController@setLang')->name('setLang');
    //register new user
    Route::post('/users/store','UserController@store')->name('users.store');
    //get the favorite page 
    Route::get('/favorites','UserController@favorites_page')->name('user.favorites');
    //get the cart page
    Route::get('/cart','UserController@cart_page')->name('user.cart');

    //verify email
    Route::get('/verifyEmailpage',function(){
       return view('En.verifyEmail');
    })->name('email.activation');
    Route::get('/verifyEmail/{emailtokenv}','UserController@verifyEmailg')->name('email.verifyg');
    Route::post('/verifyEmail','UserController@verifyEmail')->name('email.verify');
    //the static pages 
    Route::get('/about_us','HomeController@about_us')->name('about_us');
    Route::get('/terms','HomeController@terms')->name('terms');
    Route::get('/faq','HomeController@faq')->name('faq');

    //the dashboard 
    Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
});
Route::group(['as'=>'user.','middleware'=>'auth'],function(){
   // favorite operations 
   Route::get('/users/{user_id}/favorites','UserController@getFavorites')->name('getFavorites');
   Route::post('/user/favorites/add','UserController@addFavorite')->name('addFavorite');
   Route::get('/user/favorites/{id}/delete','UserController@removeFavorite')->name('removeFavorite');
   // cart operations
   Route::get('/users/{user_id}/cartItems','UserController@getCartItems')->name('getCartItems');
   Route::post('/user/carItems/add','UserController@addCartItem')->name('addCartItem');
   Route::get('/user/carItems/{id}/delete','UserController@removeCartItem')->name('removeCartItem');
   
});
Route::get('json-api', 'ApiController@index');


Route::group(['prefix' => 'admin','as'=>'admin.'], function () {

  Route::get('/', 'AdminController@index')->name('index');
  Route::get('/home', 'AdminController@index')->name('index');
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
  Route::get('/settings','AdminController@settingsPage')->name('settings');
  Route::get('/users','AdminController@usersPage')->name('users');
  Route::get('/block_user/{user_id}','AdminController@block_user')->name('block_user');
  Route::get('/unblock_user/{user_id}','AdminController@unblock_user')->name('unblock_user');
  Route::post('/updateSiteSettings','AdminController@updateSiteSettings')->name('updateSiteSettings');
  Route::post('/updateAdmin','AdminController@updateSiteSettings')->name('update_admin');
  //the products page 
  Route::get('/products','AdminController@productsPage')->name('products');
  Route::get('/getFavoritedproducts','AdminController@getFavoritedproducts')->name('getFavoritedproducts');
  //the tickets page
  Route::get('/tickets','AdminController@tickets')->name('tickets'); 
  Route::get('/alltickets','AdminController@gettickets')->name('alltickets'); 
  Route::get('/tickets/{id}','AdminController@showTicket')->name('showTicket'); 
  //the static pages
  Route::get('/pages/{slug}','AdminController@staticpages')->name('pages');
  Route::post('/updatePage/{slug}','AdminController@updatePage')->name('updatePage');
});


