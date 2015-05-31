<?php

class CustomersController extends \BaseController {

	public function showOrderingPage()
	{
		$client_name = Client::select('name')->where('domain', '=', Session::get('domain'))->first()->name;
		$client_id = Client::select('id')->where('domain', '=', Session::get('domain'))->first()->id;
		$categories = Category::with('products')->where('client_id', '=', $client_id)->get();
		// echo "<pre>";
		// print_r($categories);
		// echo "</pre>";
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

			return View::make('website.ordering', compact('categories', 'order_products', 'customer_info', 'client_name'))->nest('navbar', 'default.customer_navbar');	
	}

	public function customerRegister()
	{
		#Get Client ID
		$client = Client::select('id')->where('domain', '=', Session::get('domain'))->get();
		$client_id = $client[0]['id'];

		return View::make('website.register', compact('client_id'))->nest('navbar', 'default.customer_navbar');
	}

	public function customerRegisterValidate()
	{
		$data = Input::all();
		
		# Data Segragation Per table
		$customer_data = array();
		for ($i=0; $i < count($data) ; $i++) { 
			$customer_data['client_id'] = $data['client_id'];
			$customer_data['first_name'] = $data['first_name'];
			$customer_data['last_name'] = $data['last_name'];
			$customer_data['gender'] = $data['gender'];
			$customer_data['del_contact_number'] = $data['del_contact_number'];
			$customer_data['del_address_number'] = $data['del_address_number'];
			$customer_data['del_address_baranggay'] = $data['del_address_baranggay'];
			$customer_data['del_address_municipal'] = $data['del_address_municipal'];
			$customer_data['del_address_province'] = $data['del_address_province'];
			$customer_data['status'] = 'ACTIVE';
		}

		$user_data = array();
		for ($i=0; $i < count($data) ; $i++) { 
			$user_data['username'] = $data['username'];
			$user_data['password'] = Hash::make($data['password']);
			$user_data['user_type'] = 'customer';
		}

		# Validation
		$validatorCustomer = Validator::make($customer_data, Customer::$rules, Customer::$messages);
		$validatorCustomer->setAttributeNames(Customer::$friendly_names);
		$validatorUser = Validator::make($user_data, User::$rules, User::$messages);
		$validatorUser->setAttributeNames(User::$friendly_names);
		
		if ($validatorCustomer->fails() || $validatorUser->fails())
		{
			$validationMessages = array_merge_recursive($validatorUser->messages()->toArray(), $validatorCustomer->messages()->toArray());
			return Redirect::back()->withErrors($validationMessages)->withInput();
		}

		# Database Insertion
		$inserted_customer = Customer::create($customer_data);
		$user_data['foreign_id'] = $inserted_customer->id;
		$inserted_user = User::create($user_data);

		return Redirect::route('client_website');
	}

	/**
	 * Display a listing of customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::with('orders')->paginate(10);

		return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new customer
	 *
	 * @return Response
	 */
	public function create()
	{
		$gender = array('F'=>'Female', 'M'=>'Male');
		return View::make('customers.create', compact('gender'));
	}

	/**
	 * Store a newly created customer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Customer::$rules, Customer::$messages);
		$validator->setAttributeNames(Customer::$friendly_names);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Customer::create($data);

		return Redirect::route('customers.index');
	}

	/**
	 * Display the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::findOrFail($id);

		return View::make('customers.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::find($id);
		$gender = array('F'=>'Female', 'M'=>'Male');

		return View::make('customers.edit', compact('customer', 'gender'));
	}

	/**
	 * Update the specified customer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$customer = Customer::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Customer::$rules, Customer::$messages);
		$validator->setAttributeNames(Customer::$friendly_names);


		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$customer->update($data);

		return Redirect::route('customers.index');
	}

	/**
	 * Remove the specified customer from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Customer::destroy($id);

		return Redirect::route('customers.index');
	}

}
