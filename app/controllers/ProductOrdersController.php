<?php

class ProductOrdersController extends \BaseController {

	/**
	 * Display a listing of productorders
	 *
	 * @return Response
	 */
	public function index()
	{
		$productorders = Productorder::all();

		return View::make('productorders.index', compact('productorders'));
	}

	/**
	 * Show the form for creating a new productorder
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('productorders.create');
	}

	/**
	 * Store a newly created productorder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Productorder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Productorder::create($data);

		return Redirect::route('productorders.index');
	}

	/**
	 * Display the specified productorder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$productorder = Productorder::findOrFail($id);

		return View::make('productorders.show', compact('productorder'));
	}

	/**
	 * Show the form for editing the specified productorder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$productorder = Productorder::find($id);

		return View::make('productorders.edit', compact('productorder'));
	}

	/**
	 * Update the specified productorder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$productorder = Productorder::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Productorder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$productorder->update($data);

		return Redirect::route('productorders.index');
	}

	/**
	 * Remove the specified productorder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Productorder::destroy($id);

		return Redirect::route('productorders.index');
	}

}
