<?php

class DefaultController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// If there is no client, this is the landing page where you can
		// create a new client

		$view = View::make('default.index')->nest('navbar', 'default.navbar');
		return $view;
	} # End index

	public function freeSubscription()
	{
		$view = View::make('default.subscribe')->nest('navbar', 'default.navbar');
		return $view;
	} # End subscribe

	public function doFreeSubscribe()
	{
		
		$rules = array(
			'name' => 'required|min:2',
			'description' => 'required',
			'contact_number' => 'required',
			'address' => 'required',
			'image' => 'required|image',
			'tagline' => 'required',
			'domain' => 'required',
			'primary_color' => 'required',
			'product_image' => 'required|image',
			'product_name' => 'required',
			'product_description' => 'required',
			'product_price' => 'required'
			);


		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('free')->withErrors($validator);
		}
		else
		{
			if (Input::hasFile('image'))
			{
				$file = Input::file('image');
			}

			$client = new Client;
			$client->name = Input::get('name');
			$client->description = Input::get('description');
			$client->tagline = Input::get('tagline');
			$client->image = $file->getClientOriginalName();
			$client->primary_color = Input::get('primary_color');
			$client->contact_number = Input::get('contact_number');
			$client->address = Input::get('address');
			$client->domain = Input::get('domain');
			$client->email = Input::get('email');
			$client->subscription_id = 0;
			$client->save();

			$directory = File::makeDirectory(public_path().'/uploads/'.Input::get('name'));

			$filename = $file->getClientOriginalName();
			$file->move(public_path().'/uploads/'.Input::get('name'), $filename);

			$newClient = Client::where('name', '=', Input::get('name'))->first();

			if (Input::hasFile('product_image'))
			{
				$prodFile = Input::file('product_image');

				$product = new Product;
				$product->name = Input::get('product_name');
				$product->description = Input::get('product_description');
				$product->price = Input::get('product_price');
				$product->image = $prodFile->getClientOriginalName();
				$product->status = 'ACTIVE';
				$product->client_id = $newClient->id;
				$product->save();

				$prodFile->move(public_path().'/uploads/'.Input::get('name'), $prodFile->getClientOriginalName());
			}

			# New Subscription
			$subscription = new Subscription;
			$subscription->client_id = $newClient->id;
			$subscription->subscription_type_id = 1;


			return Redirect::to('subscriptionPayment?type=1&id='.$newClient->id);

		} # End if-else validation

	} # End doFreeSubscribe

	public function uploadStarterBanner()
	{
		$rule = array('banners' => 'required');
		$validator = Validator::make(Input::all(), $rule);

		if ($validator->fails())
		{
			return Redirect::to('free')->withErrors($validator);
		}
		else
		{
			if (Input::hasFile('banners'))
			{
				$banners = Input::file('banners');

				$filename = $banners->getClientOriginalName();
				$banners->move(public_path().'/banners/', $filename);

				$banner = new Banner;
				$banner->filename = $filename;
				$banner->status = 1;
					
				$banner->save();

				# Update the client id of the newly uploaded images
				$newBanner = Banner::where('filename', '=', $filename)->first();
				$newClient = Client::where('created_at', '=', $newBanner->created_at)->first();

				$newBanner->client_id = $newClient->id;
				$newBanner->save();

			} # End if hasFile
		} # End if validator
		
	}

	public function subscriptionPayment()
	{
		$data['client'] = Client::find(Input::get('id'));

		$view = View::make('default.payment', $data)->nest('navbar', 'default.navbar');
		return $view;
	} # End subscriptionPayment

	public function doSubscriptionPayment()
	{
		$subscription = new Subscription;

		if (Input::get('client_id') == '')
		{
			$client = new Client;
			$client->email = Input::get('email');
			$client->save();

			$newClient = Client::where('email', '=', Input::get('email'))->first();

			$subscription->client_id = $newClient->id;
			$subscription->subscription_type_id = Input::get('subscription_type_id');
			$subscription->transaction_number = 0;
			$subscription->total_amount = 0;
			$subscription->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
			$subscription->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
			$subscription->save();
		}
		else
		{
			$subscription->client_id = Input::get('client_id');
			$subscription->subscription_type_id = Input::get('subscription_type_id');
			$subscription->transaction_number = 0;
			$subscription->total_amount = 0;
			$subscription->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
			$subscription->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
			$subscription->save();
		} # End Input::get('client_id')

		return Redirect::to('subscriptionSuccess');
	} # End doSubscriptionPayment

	public function subscriptionSuccess()
	{
		$view = View::make('default.success')->nest('navbar', 'default.navbar');
		return $view;
	} # End subscriptionSuccess

	public function enterTransactionNumber()
	{

	} # End enterTransactionNumber

	public function doEnterTransactionNumber()
	{
		$rules = array(
			'subscription_id'    => 'required',
			'transaction_number' => 'required'
		);

		$sub = Subscription::find(Input::get('subscription_id'));
		$sub->transaction_number = Input::get('transaction_number');
		$sub->save();

		return Redirect::to('/');
	} # End doEnterTransactionNumber



}
