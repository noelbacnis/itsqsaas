<?php

class UsersController extends \BaseController {


	public function clientLogin()
	{
		$menu_bar_visibility = true;
		if(Auth::check()){
			return Redirect::route('client_dashboard')->with('menu_bar_visibility', $menu_bar_visibility);
		}else{
			$menu_bar_visibility = false;
			return View::make('clients.login', compact('menu_bar_visibility'));
		}
		
	}

	public function adminLogin()
	{
		$menu_bar_visibility = true;
		if(Auth::check()){
			return Redirect::route('admin_dashboard')->with('menu_bar_visibility', $menu_bar_visibility);
		}else{
			$menu_bar_visibility = false;
			return View::make('admin.login', compact('menu_bar_visibility'));
		}
		
	}

	public function customerLogin()
	{	
		$client_id = Client::select('id')->where('domain', '=', Session::get('domain'))->first()->id;
		$client_cms = Client::with('banners')->with('products')->where('id', '=', $client_id)->first();

		if(Auth::check()){
			return Redirect::route('client_website');
			// return View::make('website.website', compact('client_cms'))->nest('navbar', 'default.customer_navbar');

		}else{
			return View::make('website.login', compact('client_cms'))->nest('navbar', 'default.customer_navbar');
		}
		
	}

	public function authenticate()
	{
		$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'user_type' => Input::get('user_type')
        );

        // print_r($user);

		if(Auth::attempt($user, false)){
			if($user['user_type'] == 'client'){
				$client_id = Auth::user()->foreign_id;
				$account_status = Client::where('id', '=', $client_id)->first();
				// if($account_status->status == 'ACTIVE'){
					$subscription = Subscription::select('subscription_type_id')->where('client_id', '=', $client_id)->where('status','=','ACTIVE')->where('subscription_type_id','!=',1)->first();
					if (isset($subscription)) {
						$subscription_type = SubscriptionsType::where('id', '=', $subscription->subscription_type_id)->first();
						Session::put('subscription_type', $subscription_type->id);
						return Redirect::route('client_dashboard')->with('flash_notice', 'You have successfully logged in.')->with('alert_class', 'alert-success');
					}else{
						Auth::logout();
						return Redirect::route('client_login')->with('flash_notice', 'Account not yet activated by the admin')->with('alert_class', 'alert-danger');
					}
				
			}else if($user['user_type'] == 'customer'){
				$customer_id = Auth::user()->foreign_id;
				$customer_client_id = Customer::select('client_id')->where('id', '=', $customer_id)->first()->client_id;
				$domain_client_id = Client::select('id')->where('domain', '=', Session::get('domain'))->first()->id;
				if($customer_client_id == $domain_client_id){
					return Redirect::route('client_website')->with('flash_notice', 'You have successfully logged in.');
				}else{
					Auth::logout();
					return Redirect::route('customer_login')->with('flash_notice', 'Log in failed.')->with('alert_class', 'alert-danger');
				}

			}else if($user['user_type'] == 'admin'){
				return Redirect::route('admin_dashboard')->with('flash_notice', 'You have successfully logged in.');
			}

		}else{
			if($user['user_type'] == 'client'){
				return Redirect::route('client_login')->with('flash_notice', 'Log in failed.')->with('alert_class', 'alert-danger');
			}else if($user['user_type'] == 'customer'){
				return Redirect::route('customer_login')->with('flash_notice', 'Log in failed.')->with('alert_class', 'alert-danger');
			}else if($user['user_type'] == 'admin'){
				return Redirect::route('admin_login')->with('flash_notice', 'Log in failed.')->with('alert_class', 'alert-danger');
			}
		}
	}

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('customer')->where('foreign_id', '=', Auth::user()->foreign_id)->paginate(10);

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}




}
