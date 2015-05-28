<?php

class ClientsController extends \BaseController {

	public function showClientHome()
	{
		$client_id = Auth::user()->id;
		$client = Client::where('id', '=', $client_id)->with('subscription')->get();

		return View::make('clients.dashboard', compact('client'));
	}

	public function showAdminHome()
	{
		// $client_id = Auth::user()->id;
		// $client = Client::where('id', '=', $client_id)->with('subscription')->get();
		return View::make('admin.dashboard');
	}

	public function showClientWebsite($domain)
	{
		$domain_count = Client::where('domain', '=', $domain)->count();
		
		if ($domain_count > 0) {
			Session::put('domain', $domain);
			$client_id = Client::select('id')->where('domain', '=', $domain)->first()->id;
			$subscription = Subscription::select('subscription_type_id')->where('client_id', '=', $client_id)->first();
			$subscription_type = SubscriptionsType::select('name')->where('id', '=', $subscription->subscription_type_id)->first();
					
			Session::remove('domain_subscription_type');
			Session::put('domain_subscription_type', $subscription_type->name);

			return View::make('website.website')->nest('navbar', 'default.customer_navbar');
			// return View::make('clients.website', compact('categories', 'order_products', 'customer_info', 'client_name'))->nest('navbar', 'default.customer_navbar');
		}else{
			echo "No such domain";
		}
		
	}

	/**
	 * Display a listing of clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

		return View::make('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new client
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Client::create($data);

		return Redirect::route('clients.index');
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::findOrFail($id);

		return View::make('clients.show', compact('client'));
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::find($id);

		return View::make('clients.edit', compact('client'));
	}

	/**
	 * Update the specified client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = Client::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$client->update($data);

		return Redirect::route('clients.index');
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Client::destroy($id);

		return Redirect::route('clients.index');
	}

}
