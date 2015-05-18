<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'DefaultController@index');
<<<<<<< HEAD
Route::get('subscribe', 'DefaultController@subscribe');
Route::post('subscribe/doSubscribe', 'DefaultController@doSubscribe');
=======

Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('customers', 'CustomersController');
Route::resource('orders', 'OrdersController');
Route::resource('subscriptions', 'SubscriptionsController');
>>>>>>> 498238c2cb51e479c13d96a39af6a8a4a5d3c1a8
