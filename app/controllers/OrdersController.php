<?php

class OrdersController extends \BaseController {

	public function addOrder()
	{
		# GET ORDERED PRODUCT FROM VIEW
		$qty = Input::get('quantity');
		$price = Input::get('price');
		$product_id = Input::get('id');

		# GETING CLIENT AND CUSTOMER ID
		$client_id_object = Client::select('id')->where('domain', '=', Session::get('domain'))->get();
		$client_id = $client_id_object[0]['id'];
		$customer_id = Auth::user()->foreign_id;

		# CHECK IF THERE ARE ANY PENDING CART ORDERS
		$order = Order::where('customer_id', '=', $customer_id)->where('status', '=', 'PENDING')->get();
		if ($order->count() == 0) { 
			# NEW ORDER
			$order_data['total'] = $qty * $price;
			$order_data['customer_id'] = $customer_id;
			$order_data['status'] = 'PENDING';
			$order_data['client_id'] = $client_id;
			$order_data['registered'] = 'YES';

			$inserted_order = Order::create($order_data);
			$order_id = $inserted_order->id;

		}else{ 
			# ALEADY HAVE A PENDING UNSUBMITTED ORDER
			$order_id = $order[0]['id'];
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

	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::paginate(10);

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
		$order = Order::findOrFail($id);

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
