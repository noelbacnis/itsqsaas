<?php

class ClientsController extends \BaseController {

	public function showClientHome()
	{
		$client_id = Auth::user()->id;
		$client = Client::where('id', '=', $client_id)->with('subscription')->get();

		return View::make('clients.dashboard', compact('client'));
	}

	public function showClientWebsite($domain)
	{
		$domain_count = Client::where('domain', '=', $domain)->count();
		Session::put('domain', $domain);
		if ($domain_count > 0) {
			$categories = Category::with('products')->get();
			if(Auth::check()){
				$customer_id = Auth::user()->foreign_id;
				$customer_info = Customer::with('user')->findOrFail($customer_id);
				$order = Order::where('customer_id', '=', $customer_id)->where('status', '=', 'PENDING')->get();
				if ($order->count() != 0) {
					$order_id = $order[0]['id'];
					$order_products = OrdersProduct::where('order_id', '=', $order_id)->with('product')->get();
				}
			}else{
				if(Session::has('guest_hash')){
					$guest_hash = Session::get('guest_hash');
					$order = Order::where('guest_hash', '=', $guest_hash)->where('status', '=', 'PENDING')->get();
					if ($order->count() != 0) {
						$order_id = $order[0]['id'];
						$order_products = OrdersProduct::where('order_id', '=', $order_id)->with('product')->get();
					}
				}
			}
			// echo 'haha--'.Session::get('domain');
			return View::make('clients.website', compact('categories', 'order_products', 'customer_info'))->nest('navbar', 'default.customer_navbar');
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
