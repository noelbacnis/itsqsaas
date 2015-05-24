<?php

class ProductsController extends \BaseController {

	public function viewProduct($id)
	{
		$categories = Category::with('products')->get();
		$product = Product::where('id', '=', $id)->get();
		return View::make('clients.website', compact('categories', 'product'))->nest('navbar', 'default.navbar');
	}

	public function addOrder()
	{
		$id = Input::get('quantity');
		echo $id;
	}

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::paginate(10);

		return View::make('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
		$status = array('ACTIVE'=>'ACTIVE', 'INACTIVE'=>'INACTIVE');
		$categories = Category::orderBy('name')->lists('name', 'id');

		return View::make('products.create', compact('status','categories'));
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules, Product::$messages);
		$validator->setAttributeNames(Product::$friendly_names);
		
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('products.index');
	}

	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		return View::make('products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
		$status = array('ACTIVE'=>'ACTIVE', 'INACTIVE'=>'INACTIVE');
		$categories = Category::orderBy('name')->lists('name', 'id');

		return View::make('products.edit', compact('product','status','categories'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules,  Product::$messages);
		$validator->setAttributeNames(Product::$friendly_names);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return Redirect::route('products.index');
	}

}
