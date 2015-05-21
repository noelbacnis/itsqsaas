<?php

class OrdersProductsController extends \BaseController {

	/**
	 * Display a listing of ordersproducts
	 *
	 * @return Response
	 */
	public function index()
	{
		$ordersproducts = Ordersproduct::all();

		return View::make('ordersproducts.index', compact('ordersproducts'));
	}

	/**
	 * Show the form for creating a new ordersproduct
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ordersproducts.create');
	}

	/**
	 * Store a newly created ordersproduct in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ordersproduct::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Ordersproduct::create($data);

		return Redirect::route('ordersproducts.index');
	}

	/**
	 * Display the specified ordersproduct.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ordersproduct = Ordersproduct::findOrFail($id);

		return View::make('ordersproducts.show', compact('ordersproduct'));
	}

	/**
	 * Show the form for editing the specified ordersproduct.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ordersproduct = Ordersproduct::find($id);

		return View::make('ordersproducts.edit', compact('ordersproduct'));
	}

	/**
	 * Update the specified ordersproduct in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ordersproduct = Ordersproduct::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ordersproduct::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ordersproduct->update($data);

		return Redirect::route('ordersproducts.index');
	}

	/**
	 * Remove the specified ordersproduct from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ordersproduct::destroy($id);

		return Redirect::route('ordersproducts.index');
	}

}
