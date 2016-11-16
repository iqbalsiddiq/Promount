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

Route::get('/', 'HomeController@index');
Route::get('/products', 'ProductController@index');
Route::get('/find', 'FindController@index');
Route::get('/category', 'CategoryController@index');
Route::get('/cart', 'CartController@index');
Route::get('/cart/addCart/{id}/{quantity}', 'CartController@addCart');
Route::get('/checkout', 'CheckoutController@index');
Route::get('/signin', 'AuthenticationController@index');
