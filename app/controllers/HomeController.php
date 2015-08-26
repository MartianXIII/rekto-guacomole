<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
		//return Redirect::action('HomeController@sayHello');
	}


	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		//Laravel doesnt care what key to login such as email or user
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    return Redirect::intended('/');
	} else {
    // login failed, go back to the login screen
		//1 Display a session flash error
		//2 Log email that tried to authenticate
		return Redirect::action('HomeController@showLogin');
		}
	}

	public function doLogout()
	{
			Auth::logout();
			//session flash "so long and thanks"
			return Redirect::to('/');
	}
}
