<?php

class AirlinesController extends BaseController {

	/**
	 * Airline Repository
	 *
	 * @var Airline
	 */
	protected $airline;

	public function __construct(Airline $airline)
	{
		$this->airline = $airline;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$airlines = $this->airline->all();

		return View::make('airlines.index', compact('airlines'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('airlines.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::only('airline_code','airline_name','blacklisted');
		$validation = Validator::make($input, Airline::$rules);

		if ($validation->passes())
		{
			$this->airline->create($input);

			return Redirect::route('admin.airlines.index');
		}

		return Redirect::route('admin.airlines.create')
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
		$airline = $this->airline->findOrFail($id);

		return View::make('airlines.show', compact('airline'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$airline = $this->airline->find($id);

		if (is_null($airline))
		{
			return Redirect::route('airlines.index');
		}

		return View::make('airlines.edit', compact('airline'));
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
		$validation = Validator::make($input, Airline::$rules);

		if ($validation->passes())
		{
			$airline = $this->airline->find($id);
			$airline->update($input);

			return Redirect::route('admin.airlines.show', $id);
		}

		return Redirect::route('admin.airlines.edit', $id)
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
		$this->airline->find($id)->delete();

		return Redirect::route('admin.airlines.index');
	}

}
