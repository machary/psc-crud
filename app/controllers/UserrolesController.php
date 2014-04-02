<?php

class UserrolesController extends BaseController {

	/**
	 * Userrole Repository
	 *
	 * @var Userrole
	 */
	protected $userrole;

	public function __construct(Userrole $userrole)
	{
		$this->userrole = $userrole;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $userroles = userrole::select('user_name')->orderBy('user_name','ASC')->distinct()->get();

		return View::make('userroles.index', compact('userroles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $user_options = User::lists('username','username');
        $categories = DB::table('client_user_role')->distinct()->orderBy('role_name','ASC')->lists('role_name');

		return View::make('userroles.create', compact('user_options','categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Userrole::$rules);

		if ($validation->passes())
		{
            $selected_categories = $input['categories'];

            foreach($selected_categories as $val){
                $this->userrole->create(array('user_name' => $input['user_name'], 'role_name' => $val));
            }

			return Redirect::route('admin.userroles.index');
		}

		return Redirect::route('admin.userroles.create')
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
		$userrole = $this->userrole->findOrFail($id);

		return View::make('userroles.show', compact('userrole'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userrole = userrole::find($id);

        // get existing roles, we're gonna check if the user has it
        $categories = DB::table('client_user_role')->distinct()->orderBy('role_name','ASC')->lists('role_name');

        $selected_roles = DB::table('user_role_map')->where('user_name', '=', $id)->orderBy('role_name','ASC')->lists('role_name');

		if (is_null($userrole))
		{
			return Redirect::route('admin.userroles.index');
		}

        $r = array('userrole'=> $userrole,'selected_role'=> $selected_roles,'categories'=> $categories );

		return View::make('userroles.edit', $r);
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
		$validation = Validator::make($input, array('categories' => 'required')); //user must! select at least 1 category

		if ($validation->passes())
		{
            //find which has same $id, delete it
			$this->userrole->find($id)->delete();

            //insert new userrole
            $selected_categories = $input['categories'];
            foreach($selected_categories as $val){
                $this->userrole->create(array('user_name' => $id, 'role_name' => $val));
            }

			return Redirect::route('admin.userroles.show', $id);
		}

		return Redirect::route('admin.userroles.edit', $id)
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
		$this->userrole->find($id)->delete();

		return Redirect::route('admin.userroles.index');
	}

}
