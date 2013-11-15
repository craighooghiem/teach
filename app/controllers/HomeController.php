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

	public function __construct()
	{
		Asset::add('normalize', 		'normalize.css');
		Asset::add('foundation', 		'css/foundation.min.css');
		Asset::add('style', 			'css/style.css');
		Asset::add('jquery',			'htp://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
		Asset::add('foundation', 		'foundation.min.js');
		Asset::add('foundation.form', 	'js/foundation/foundation.forms.js');
	}

	var $layout = 'layouts.home';

	public function showWelcome()
	{
		return View::make('home.hello');
	}

	public function showRegister()
	{
		return View::make('home.register');
	}

	public function doRegister()
	{
		// Register a new account
		Input::flash();
		if(Input::has('password') && Input::has('username'))
		{
			if(Input::get('password') == Input::get('password_2'))
			{
				$user = new User;
				$user->username = Input::get('username');
				$user->password = Hash::make(Input::get('password'));
				$user->save();

				$user = array(
			        'username' => Input::get('username'),
			        'password' => Input::get('password')
			    );
			    
			    Auth::attempt($user);

				return Redirect::to('/')->with('flash_notice', 'You have been successfully logged in');

			}
			else
			{
				return Redirect::to('register')->with('flash_notice', 'The passwords did not match');
			}
		}
		else
		{
			return Redirect::to('register')->with('flash_notice', 'A username and password are required to register.');
		}
	}

}