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
			'primary_color' => 'required'
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
			$client->save();

			return Redirect::to('subscriptionPayment');

		} # End if-else validation

	} # End doFreeSubscribe

	public function uploadStarterBanner()
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
	}

	public function subscriptionPayment()
	{
		$view = View::make('default.payment')->nest('navbar', 'default.navbar');
		return $view;
	} # End subscriptionPayment



}
