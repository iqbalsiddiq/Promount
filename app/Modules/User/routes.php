<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(array('module'=>'Admin','namespace' => 'App\Modules\User\Controllers'), function() {
    Route::get('/','HomeController@index');

Route::get('/products', 'ProductController@index');
Route::get('/find', 'FindController@index');
Route::get('/category', 'CategoryController@index');
Route::get('/cart', 'CartController@index');
Route::get('/cart/addCart/{id}/{quantity}', 'CartController@addCart');
Route::get('/cart/minCart/{id}/{quantity}', 'CartController@minCart');
Route::get('/cart/Delitem/{id}/{quantity}', 'CartController@Delitem');
Route::get('/checkout', 'CheckoutController@index');
Route::get('/signin', 'AuthenticationController@index');
Route::get('/signin/signup/{email}/{pass}', 'AuthenticationController@signup');
Route::get('/signin/confirmemail/{email}', 'AuthenticationController@confirmemail');
Route::get('/signin/signin/{email}/{pass}', 'AuthenticationController@signin');
Route::get('/signin/logout', 'AuthenticationController@logout');
Route::get('/signin/test', 'AuthenticationController@test');
});