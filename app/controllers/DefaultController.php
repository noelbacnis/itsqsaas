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
	}



}
