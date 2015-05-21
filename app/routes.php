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

Route::get('free', 'DefaultController@freeSubscription');
Route::post('subscribe/doFreeSubscribe', 'DefaultController@doFreeSubscribe');

Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('customers', 'CustomersController');
Route::resource('orders', 'OrdersController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('clients', 'ClientsController');


