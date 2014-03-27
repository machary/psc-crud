<?php

class FlightplansController extends BaseController {

	/**
	 * Flightplan Repository
	 *
	 * @var Flightplan
	 */
	protected $flightplan;

	public function __construct(Flightplan $flightplan)
	{
		$this->flightplan = $flightplan;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$flightplans = $this->flightplan->all();

		return View::make('flightplans.index', compact('flightplans'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $airline_options = Airline::lists('airline_name','airline_code');
        $aiport_options = Airport::lists('airport_name','airport_code');
		return View::make('flightplans.create',
            array(
                'airline_options' => $airline_options,
                'airport_options' => $aiport_options
            ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('airline', 'flightnum', 'default_dep_time', 'destination', 'blacklisted');
		$validation = Validator::make($input, Flightplan::$rules);

		if ($validation->passes())
		{
			$this->flightplan->create($input);

			return Redirect::route('flightplans.index');
		}

		return Redirect::route('flightplans.create')
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
		$flightplan = $this->flightplan->findOrFail($id);

		return View::make('flightplans.show', compact('flightplan'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$flightplan = $this->flightplan->find($id);

		if (is_null($flightplan))
		{
			return Redirect::route('flightplans.index');
		}

		return View::make('flightplans.edit', compact('flightplan'));
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
		$validation = Validator::make($input, Flightplan::$rules);

		if ($validation->passes())
		{
			$flightplan = $this->flightplan->find($id);
			$flightplan->update($input);

			return Redirect::route('flightplans.show', $id);
		}

		return Redirect::route('flightplans.edit', $id)
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
		$this->flightplan->find($id)->delete();

		return Redirect::route('flightplans.index');
	}

}
