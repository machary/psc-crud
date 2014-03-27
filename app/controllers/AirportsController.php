<?php

class AirportsController extends BaseController {

	/**
	 * Airport Repository
	 *
	 * @var Airport
	 */
	protected $airport;

	public function __construct(Airport $airport)
	{
		$this->airport = $airport;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$airports = $this->airport->all();

		return View::make('airports.index', compact('airports'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('airports.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('airport_code','airport_name','city');
		$validation = Validator::make($input, Airport::$rules);

		if ($validation->passes())
		{
			$this->airport->create($input);

			return Redirect::route('airports.index');
		}

		return Redirect::route('airports.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$airport = $this->airport->findOrFail($id);

		return View::make('airports.show', compact('airport'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$airport = $this->airport->find($id);

		if (is_null($airport))
		{
			return Redirect::route('airports.index');
		}

		return View::make('airports.edit', compact('airport'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Airport::$rules);

		if ($validation->passes())
		{
			$airport = $this->airport->find($id);
			$airport->update($input);

			return Redirect::route('airports.show', $id);
		}

		return Redirect::route('airports.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->airport->find($id)->delete();

		return Redirect::route('airports.index');
	}

}
