<?php

class ClientsController extends \BaseController {

	public function showClientHome()
	{
		$client_id = Auth::user()->id;
		$client = Client::where('id', '=', $client_id)->with('subscription')->get();

		return View::make('clients.dashboard', compact('client'));
	}

	public function showClientInfo()
	{
		$clients = Client::with(array('subscription'=>function($query){
									$query->with('subscriptionsType');
				}))->where('id', '=', Auth::user()->foreign_id)->first();
		// print_r($clients);
		return View::make('clients.client_info', compact('clients'));
	}

	public function showClientSubscriptions()
	{
		$subscriptions = Subscription::with('subscriptionsType')->where('client_id', '=', Auth::user()->foreign_id)->get();
		// print_r($clients);
		return View::make('clients.client_subscription', compact('subscriptions'));
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
		$domain_info = Client::where('domain', '=', $domain)->first();

		// echo "<pre>";
		// 	print_r($domain);
		// 	echo "</pre>";

		if ($domain_count > 0) {
			if ($domain_info->status == 'ACTIVE') {
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
			}
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

	public function upgradeSubscription()
	{

		$sub = new Subscription;
		$sub->client_id = Input::get('client_id');
		$sub->subscription_type_id = Input::get('subscription_type_id');
		$sub->total_amount = (59.99*Input::get('period'));
		$sub->status = 'INACTIVE';
		$sub->save();

		return Redirect::to('client/dashboard');

	} # End upgradeSubscription

	public function doEnterTransactionNumber()
	{
		$client_id = Auth::user()->foreign_id;

		$old = Subscription::where('status', '=', 'ACTIVE')->where('client_id', '=', $client_id)->first();
		$old->end_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
		$old->status = 'INACTIVE';
		$old->save();

		$sub = Subscription::find(Input::get('subscription_id'));
		$sub->transaction_number = Input::get('transaction_number');
		$sub->status = 'ACTIVE';
		$sub->save();

		Session::forget('subscription_type');
		Session::put('subscription_type', 3);

		return Redirect::to('client/dashboard');
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

		// return Redirect::route('clients.index');
		return Redirect::route('client_info');
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
