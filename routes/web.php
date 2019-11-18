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
    Route::post('/payments/{sku}','HomeController@payments')->name('user.payments');
    Route::get('/currencies', 'HomeController@getCurrencies');
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
   //the dashboard 
   Route::get('/userinfo','HomeController@userinfo')->name('userinfo');
   Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
   Route::get('/settings','UserController@settings')->name('settings');
   Route::post('/user/update','UserController@update')->name('update');
   Route::get('/userBillinginfo','HomeController@userBillinginfo')->name('userBillinginfo');
   Route::post('/billinginfo/update','UserController@updatebillinginfo')->name('updatebillinginfo');
   Route::get('/tickets','UserController@tickets')->name('tickets');
   Route::get('/mytickets','UserController@mytickets')->name('mytickets');
   Route::get('/tickets/{id}','UserController@showTicket')->name('showTicket'); 
   Route::post('/ticket/{id}/reply','UserController@add_ticket_reply')->name('add_ticket_reply'); 
   Route::get('/userLatestReplies','UserController@userLatestReplies')->name('userLatestReplies'); 
   Route::get('/create_ticket','UserController@addTicket')->name('addTicket'); 
   Route::post('/createTicket','UserController@createTicket')->name('createTicket'); 

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
  Route::post('/ticket/{id}/reply','AdminController@add_ticket_reply')->name('add_ticket_reply'); 
 Route::get('/tickets/{id}/close','AdminController@close_ticket')->name('close_ticket'); 
   Route::get('/tickets/{id}/open','AdminController@open_ticket')->name('open_ticket'); 
});


