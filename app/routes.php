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


Route::post('uploadStarterBanner', 'DefaultController@uploadStarterBanner');

Route::get('subscriptionPayment', 'DefaultController@subscriptionPayment');

// Route::get('subscribe', 'DefaultController@subscribe');
// Route::post('subscribe/doSubscribe', 'DefaultController@doSubscribe');


Route::group(array('before'=>'client_guest'), function() {  
	Route::get('client', function(){ return Redirect::route('client_login'); });
	Route::get('client/login', array('as' => 'client_login', 'uses' => 'UsersController@clientLogin'));
	Route::post('client/authenticate', array('as' => 'client_authenticate','uses' => 'UsersController@clientAuthenticate'));

});

Route::group(array('before'=>'client_auth'), function() {  
	Route::get('client/dashboard', array('as' => 'client_dashboard', 'uses' => 'ClientsController@showClientHome'));
	Route::get('client/logout', array('as' => 'client_logout', function () {
		Auth::logout();
		return Redirect::route('client_login')->with('flash_notice', 'You are successfully logged out.')->with('alert_class', 'alert-success');
	}));

});

Route::get('www/{domain}', 'ClientsController@showClientWebsite');

Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('customers', 'CustomersController');
Route::resource('orders', 'OrdersController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('clients', 'ClientsController');
Route::resource('banners', 'BannersController');


