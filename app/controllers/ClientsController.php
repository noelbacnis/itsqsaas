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
		// $domain = Client::where('domain', '=', $domain)->count();
		$domain_info = Client::where('domain', '=', $domain)->first();

		// echo "<pre>";
		// 	print_r($domain);
		// 	echo "</pre>";

		if (isset($domain_info) && $domain_info->status == 'ACTIVE') {
		// if ($domain > 0) {
			Session::put('domain', $domain);
			$client_name = Client::select('name')->where('domain', '=', Session::get('domain'))->first()->name;
			$client_id = Client::select('id')->where('domain', '=', $domain)->first()->id;
			$subscription = Subscription::select('subscription_type_id')->where('client_id', '=', $client_id)->first();
			$subscription_type = SubscriptionsType::select('name')->where('id', '=', $subscription->subscription_type_id)->first();
					
			Session::remove('domain_subscription_type');
			Session::put('domain_subscription_type', $subscription_type->name);

			$client_cms = Client::with('banners')->with('products')->where('id', '=', $client_id)->first();
			// $client_cms = Client::with('banners')->with(array('products'=>function($query){
			// 											$query->with('category');
			// 										}))->where('id', '=', $client_id)->first();


			// echo "<pre>";
			// print_r($domain);
			// echo "</pre>";
			return View::make('website.website', compact('client_cms', 'client_name'))->nest('navbar', 'default.customer_navbar');
		}else if ($domain_info->status == 'INACTIVE') {
			echo "Account not yet active";
		}else{
			echo "No such domain";
		}
		
	}

	public function changeStatus($id, $status)
	{

		$client = Client::where('id', '=', $id)->first();
	    $client->status = $status;
	    $client->save();

	    return Redirect::back();
	}

	/**
	 * Display a listing of clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::with('subscription')->paginate(10);
		// echo "<pre>";
		// print_r($clients);
		// echo "</pre>";
		// foreach ($clients as $c) {
		// 	echo $c->name;
		// 	# code...
		// }
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
