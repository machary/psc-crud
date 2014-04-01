<?php

class LoginController extends BaseController {

	public function index() {
    	return View::make('pages.login');
    }

    public function doLogin()
	{
		$rules = array(
			'username'    => 'required|alphaNum|min:3',
			'password' => 'required|alphaNum|min:3'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else
        {
			// create our user data for the authentication
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

            $decrypt_pass = md5($userdata['password']);
            $counter = Login::Username($userdata['username'])->Pass($decrypt_pass)->count();

            if($counter > 0) // valid
            {
                session_start();
                $_SESSION['usr'] = $userdata['username'];
                return Redirect::to('admin/index');
            }
            else{
                return Redirect::to('login');
            }
		}
	}

    /*
     * Logout
     */

    public function doLogout() {
        session_start();
        if(isset($_SESSION['usr'])){
            unset($_SESSION['usr']);
            session_destroy();
            return Redirect::to('/')->with('message', 'Your are now logged out');
        }
        else{
            print_r('you are already logged out');
        }
    }
}
