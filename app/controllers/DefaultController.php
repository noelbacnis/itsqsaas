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

	public function subscribe()
	{
		$view = View::make('default.subscribe')->nest('navbar', 'default.navbar');
		return $view;
	} # End subscribe

	public function doSubscribe()
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
			return Redirect::to('subscribe')->withErrors($validator);
		}
		else
		{

		} # End if-else validation

	} # End doSubscribe



}
