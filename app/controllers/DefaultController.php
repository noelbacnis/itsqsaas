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
			$client->status = 'ACTIVE';
			$client->subscription_id = 0;
			$client->save();

			if (!File::exists(public_path().'/uploads/'.Input::get('name')))
			{
				$directory = File::makeDirectory(public_path().'/uploads/'.Input::get('name'));
			}

			$filename = $file->getClientOriginalName();
			$file->move(public_path().'/uploads/'.Input::get('name'), $filename);

			$newClient = Client::where('name', '=', Input::get('name'))->first();
			// echo "clid -- ".$newClient->id;
			if (Session::has('session_email'))
			{
				Session::remove('session_email');
			}
			else
			{
				Session::put('session_email', $newClient->email);
			}
			

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
			// $subscription = new Subscription;
			// $subscription->client_id = $newClient->id;
			// $subscription->subscription_type_id = 1;

			// $user = new User;
			// $user->username = Input::get('email');
			// $user->password = Hash::make('1234');
			// $user->foreign_id = $newClient->id;
			// $user->user_type = 'client';
			// $user->save();

			// echo "sess---".Session::get('session_email');

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
				// $banner->client_id = $newClient->id;
				$banner->email = Input::get('dummy_email');
					
				$banner->save();

				# Update the client id of the newly uploaded images
				// $newClient = Client::where('email', '=', Input::get('dummy_email'))->first();
				// $newBanner = Banner::where('filename', '=', $filename)->first();
				
				// $newBanner->client_id = $newClient->id;
				// $newBanner->save();

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

		if (Input::get('subscription_type_id') != 1)
		{
			$client = new Client;
			$client->email = Input::get('email');
			$client->status = 'INACTIVE';
			$client->save();

			$newClient = Client::where('email', '=', Input::get('email'))->first();

			$subscription->client_id = $newClient->id;
			$subscription->subscription_type_id = Input::get('subscription_type_id');
			$subscription->transaction_number = 0;
			$subscription->status = 'INACTIVE';
			$subscription->total_amount = Input::get('total_payment');
			$subscription->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
			$subscription->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
			$subscription->save();

			$newSub = Subscription::where('client_id', '=', $newClient->id)->first();
			$newClient->subscription_id = $newSub->id;
			$newClient->save();

			$user = new User;
			$user->username = Input::get('email');
			$user->password = Hash::make('1234');
			$user->foreign_id = $newClient->id;
			$user->user_type = 'client';
			$user->save();

			return Redirect::to('subscriptionSuccess')->with('message', 'Your subscription ID is '.$subscription->id);
		}
		else
		{
			$client = Client::find(Input::get('client_id'));
			$banners = Banner::where('email', '=', $client->email)->get();

			foreach ($banners as $b):
				$b->client_id = Input::get('client_id');
				$b->save();
			endforeach;

			$subscription->client_id = Input::get('client_id');
			$subscription->subscription_type_id = Input::get('subscription_type_id');
			$subscription->transaction_number = 0;
			$subscription->total_amount = 0;
			$subscription->status = 'INACTIVE';
			$subscription->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
			$subscription->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
			$subscription->save();

			return Redirect::to('/');
		} # End Input::get('client_id')

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
		$sub->status = 'INACTIVE';
		$sub->save();

		return Redirect::to('/');
	} # End doEnterTransactionNumber

	public function freeUpgrade()
	{
		$view = View::make('default.upgrade')->nest('navbar', 'default.navbar');
		return $view;
	} # End freeUpgrade

	public function doFreeUpgrade()
	{
		$client = Client::where('email', '=', Input::get('email'))->first();
		if(isset($client )){
			$sub = new Subscription;
			$sub->client_id = $client->id;
			$sub->subscription_type_id = Input::get('subscription_type_id');
			$sub->status = 'INACTIVE';
			$sub->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
			$sub->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
			$sub->save();

			$user = new User;
			$user->username = Input::get('email');
			$user->password = Hash::make('1234');
			$user->foreign_id = $client->id;
			$user->user_type = 'client';
			$user->save();

			return Redirect::back()->with('message', 'Your subscription ID is '.$sub->id);
		}else{
			return Redirect::back()->with('message', 'This email does not exist');

		}
	} # End doFreeUpgrade

	public function doUpgradeTransaction()
	{
		$client = Client::where('email', '=', Input::get('email'))->first();

		$old = Subscription::where('id', '!=', Input::get('subscription_id'))->where('client_id', '=', $client->id)->first();
		$old->end_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
		$old->save();

		$sub = Subscription::find(Input::get('subscription_id'));
		$sub->transaction_number = Input::get('transaction_number');
		$sub->start_period = date('Y-m-d h:i:s', strtotime(date('Y-m-d h:i:s')));
		$sub->end_period = date('Y-m-d h:i:s', strtotime("+".Input::get('period')." months", strtotime(date('Y-m-d h:i:s'))));
		$sub->status = 'INACTIVE';
		$sub->save();

		return Redirect::to('/');
	}



}
