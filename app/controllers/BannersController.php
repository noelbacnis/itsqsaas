<?php

class BannersController extends \BaseController {

	public function uploadStarterBanner()
	{
		$rule = array('banners' => 'required');
		$validator = Validator::make(Input::all(), $rule);

		if ($validator->fails())
		{
			return Redirect::back();
			// return Redirect::back()->withErrors($validator);
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
				// $newClient = Client::where('created_at', '=', $newBanner->created_at)->first();

				$newBanner->client_id = Auth::user()->foreign_id;
				$newBanner->save();

			} # End if hasFile
		} # End if validator
		
	}

	/**
	 * Display a listing of banners
	 *
	 * @return Response
	 */
	public function index()
	{
		$banners = Banner::where('client_id', '=', Auth::user()->foreign_id)->orderBy('created_at','DESC')->paginate(10);

		return View::make('banners.index', compact('banners'));
	}

	/**
	 * Show the form for creating a new banner
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('banners.create');
	}

	/**
	 * Store a newly created banner in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Banner::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Banner::create($data);

		return Redirect::route('banners.index');
	}

	/**
	 * Display the specified banner.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$banner = Banner::findOrFail($id);

		return View::make('banners.show', compact('banner'));
	}

	/**
	 * Show the form for editing the specified banner.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$banner = Banner::find($id);

		return View::make('banners.edit', compact('banner'));
	}

	/**
	 * Update the specified banner in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$banner = Banner::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Banner::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$banner->update($data);

		return Redirect::route('banners.index');
	}

	/**
	 * Remove the specified banner from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Banner::destroy($id);

		return Redirect::route('banners.index');
	}

}
