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

	public function clientAuthenticate()
	{
		$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'user_type' => Input::get('user_type')
        );

		if(Auth::attempt($user, false)){
			return Redirect::route('client_dashboard')
 								->with('flash_notice', 'You have successfully logged in.')
 								->with('alert_class', 'alert-success');
		}else{
			return Redirect::route('client_login')
 								->with('flash_notice', 'Log in failed.')
 								->with('alert_class', 'alert-danger');
		}
		// var_dump($user);
		// echo Hash::make('123');
	}


	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

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
