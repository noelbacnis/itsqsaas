<?php

class OrdersController extends \BaseController {

	public function addOrder()
	{
		# GET ORDERED PRODUCT FROM VIEW
		$qty = Input::get('quantity');
		$price = Input::get('price');
		$product_id = Input::get('id');

		# GETING CLIENT ID
		$client_id_object = Client::select('id')->where('domain', '=', Session::get('domain'))->get();
		$client_id = $client_id_object[0]['id'];

		if(Auth::check()){
			#FOR LOGGED IN CUSTOMERS
			$customer_id = Auth::user()->foreign_id;
			$order = Order::where('customer_id', '=', $customer_id)->where('status', '=', 'PENDING')->get();
			$order_data = array();
			if ($order->count() == 0) { 
				# NEW ORDER
				$order_data['total'] = $qty * $price;
				$order_data['status'] = 'PENDING';
				$order_data['client_id'] = $client_id;
				$order_data['customer_id'] = $customer_id;
				$order_data['registered'] = 'YES';

				#INSERT TO ORDERS TABLE
				$inserted_order = Order::create($order_data);
				$order_id = $inserted_order->id;


			}else{ 
				# ALEADY HAVE A PENDING UNSUBMITTED ORDER
				$order_id = $order[0]['id'];
				$order_update = Order::where('id', '=', $order_id)->first();
				$order_update->total += $qty * $price;
				$order_update->update();
				
			}

		}else{
			# FOR GUEST CUSTOMERS
			if(Session::has('guest_hash')){
				$guest_hash = Session::get('guest_hash');
				$order = Order::where('guest_hash', '=', $guest_hash)->where('status', '=', 'PENDING')->get();

				if ($order->count() == 0) { 
					# NEW ORDER
					$order_data['total'] = $qty * $price;
					$order_data['status'] = 'PENDING';
					$order_data['client_id'] = $client_id;
					$order_data['guest_hash'] = $guest_hash;

					#INSERT TO ORDERS TABLE
					$inserted_order = Order::create($order_data);
					$order_id = $inserted_order->id;

				}else{ 
					# ALEADY HAVE A PENDING UNSUBMITTED ORDER
					$order_id = $order[0]['id'];
					$order_update = Order::where('id', '=', $order_id)->first();
					$order_update->total += $qty * $price;
					$order_update->update();
				}
			}else{
				Session::put('guest_hash', Hash::make('itsqsaas')); # generate random hash of itsqsaas word
				# NEW ORDER
				$order_data['total'] = $qty * $price;
				$order_data['status'] = 'PENDING';
				$order_data['client_id'] = $client_id;
				$order_data['guest_hash'] = Session::get('guest_hash');

				#INSERT TO ORDERS TABLE
				$inserted_order = Order::create($order_data);
				$order_id = $inserted_order->id;
			}
		}

		$order_product_data['quantity'] = $qty;
		$order_product_data['order_id'] = $order_id;
		$order_product_data['product_id'] = $product_id;
		OrdersProduct::create($order_product_data);

		return Redirect::back();
	}

	public function removeOrder($id)
	{
		OrdersProduct::destroy($id);
		return Redirect::back();
	}

	public function customerOrderValidate()
	{
		$data = Input::all();
		
		if(Auth::check()){
			$order_id = Order::select('id')->where('customer_id', '=', Auth::user()->foreign_id)->get();
		}else{
			$order_id = Order::select('id')->where('guest_hash', '=', Session::get('guest_hash'))->get();
		}

		$order_id = $order_id[0]['id'];
		$order = Order::findOrFail($order_id);

		$validator = Validator::make($data = Input::all(), Order::$rules,  Order::$messages);
		$validator->setAttributeNames(Order::$friendly_names);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$order->update($data);

		if(Session::has('guest_hash')){
			Session::forget('guest_hash');
		}

		return Redirect::route('client_website');

	}

	public function changeStatus($id, $status)
	{

		$order = Order::where('id', '=', $id)->first();
	    $order->status = $status;
	    $order->save();

	    return Redirect::back();
	}


	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::with('customer')->where('client_id', '=', Auth::user()->foreign_id)->paginate(10);

		return View::make('orders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Order::create($data);

		return Redirect::route('orders.index');
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::with('customer')->with(array('orderProducts'=>function($query){
										    $query->with('product');
										}))->findOrFail($id);


		return View::make('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);

		return View::make('orders.edit', compact('order'));
	}

	/**
	 * Update the specified order in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$order->update($data);

		return Redirect::route('orders.index');
	}

	/**
	 * Remove the specified order from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);

		return Redirect::route('orders.index');
	}

}
