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

Route::get('freeUpgrade', 'DefaultController@freeUpgrade');
Route::post('doFreeUpgrade', 'DefaultController@doFreeUpgrade');
Route::post('doUpgradeTransaction', 'DefaultController@doUpgradeTransaction');

Route::post('uploadStarterBanner', 'DefaultController@uploadStarterBanner');

Route::get('subscriptionPayment', 'DefaultController@subscriptionPayment');

Route::post('subscribe/doSubscriptionPayment', 'DefaultController@doSubscriptionPayment');

Route::get('subscriptionSuccess', 'DefaultController@subscriptionSuccess');

Route::get('subscribe/enterTransactionNumber', 'DefaultController@enterTransactionNumber');
Route::post('subscribe/doEnterTransactionNumber', 'DefaultController@doEnterTransactionNumber');

Route::get('phpinfo', function(){ echo phpinfo(); });

Route::post('upgradeSubscription', 'ClientsController@upgradeSubscription');
Route::post('upgrade/doEnterTransactionNumber', 'ClientsController@doEnterTransactionNumber');
// Route::get('subscribe', 'DefaultController@subscribe');
// Route::post('subscribe/doSubscribe', 'DefaultController@doSubscribe');



Route::post('/authenticate', array('as' => 'authenticate','uses' => 'UsersController@authenticate'));

# Clients Admin Side routes
// Route::group(array('before'=>'client_guest'), function() {  
	Route::get('client', function(){ return Redirect::route('client_login'); });
	Route::get('client/login', array('as' => 'client_login', 'uses' => 'UsersController@clientLogin'));
// });

Route::group(array('before'=>'client_auth'), function() {  
	Route::get('client/dashboard', array('as' => 'client_dashboard', 'uses' => 'ClientsController@showClientHome'));
	Route::get('client/info', array('as' => 'client_info', 'uses' => 'ClientsController@showClientInfo'));
	Route::get('client/subscriptions', array('as' => 'client_subscription', 'uses' => 'ClientsController@showClientSubscriptions'));
	Route::get('client/logout', array('as' => 'client_logout', function () {
		Auth::logout();
		Session::forget('subscription_type');
		return Redirect::route('client_login')->with('flash_notice', 'You are successfully logged out.')->with('alert_class', 'alert-success');
	}));
	Route::get('client/order/status/{id}/{status}', array('as' => 'order_change_status', 'uses' => 'OrdersController@changeStatus'));
	Route::post('uploadBanner', 'BannersController@uploadStarterBanner');

});

Route::get('admin', function(){ return Redirect::route('admin_login'); });
Route::get('admin/login', array('as' => 'admin_login', 'uses' => 'UsersController@adminLogin'));

Route::group(array('before'=>'admin_auth'), function() {  
	Route::get('admin/dashboard', array('as' => 'admin_dashboard', 'uses' => 'ClientsController@showAdminHome'));
	Route::get('admin/logout', array('as' => 'admin_logout', function () {
		Auth::logout();
		return Redirect::route('admin_login')->with('flash_notice', 'You are successfully logged out.')->with('alert_class', 'alert-success');
	}));
	Route::get('admin/client/status/{id}/{client_id}/{status}', array('as' => 'client_change_status', 'uses' => 'ClientsController@changeStatus'));
});

Route::get('flush', function(){
	Session::flush();
});
Route::get('allsess', function(){
	echo Session::get('session_email');
});

# Client's Public Website routes
Route::get('www/{domain}', 'ClientsController@showClientWebsite');
Route::get('www/'.Session::get('domain').'/ordering', array('as' => 'customer_ordering','uses' => 'CustomersController@showOrderingPage'));
Route::get('www/'.Session::get('domain').'/product/{id}', array('as' => 'view_product', 'uses' => 'ProductsController@viewProduct') );
Route::post('www/'.Session::get('domain').'/order', array('as' => 'addorder','uses' => 'OrdersController@addOrder'));
Route::get('www/'.Session::get('domain').'/order/remove/{id}', array('as' => 'remove_order','uses' => 'OrdersController@removeOrder'));
Route::post('www/'.Session::get('domain').'/order/validate', array('as' => 'customer_order_validate', 'uses' => 'OrdersController@customerOrderValidate') );

// Route::group(array('before'=>'customer_guest'), function() {  
	Route::get('www/'.Session::get('domain').'/login', array('as' => 'customer_login', 'uses' => 'UsersController@customerLogin') );
	Route::get('www/'.Session::get('domain').'/register', array('as' => 'customer_register', 'uses' => 'CustomersController@customerRegister') );
	Route::post('www/'.Session::get('domain').'/register/validate', array('as' => 'customer_register_validate', 'uses' => 'CustomersController@customerRegisterValidate') );
// });

Route::group(array('before'=>'customer_auth'), function() { 
	Route::get('www/'.Session::get('domain'), array('as' => 'client_website', 'uses' => 'ClientsController@showClientWebsite'));
	Route::get('www/'.Session::get('domain').'/logout', array('as' => 'customer_logout', function () {
		Auth::logout();
		return Redirect::route('customer_login')->with('flash_notice', 'You are successfully logged out.')->with('alert_class', 'alert-success');
	}));
});



# CMS Resource Routes
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoriesController');
Route::resource('customers', 'CustomersController');
Route::resource('orders', 'OrdersController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('clients', 'ClientsController');
Route::resource('gallery', 'BannersController');
Route::resource('users', 'UsersController');


