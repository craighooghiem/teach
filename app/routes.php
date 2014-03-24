<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 		'HomeController@showWelcome')->before('guest');
Route::get('inside', 	'InsideController@showHome')->before('auth');

Route::get('classroom/{classroomID}',                                                   'InsideController@loadClassroom')->before('auth');
Route::get('classroom/student/{studentID}',                                             'InsideController@loadStudent')->before('auth');
Route::get('classroom/student/{studentID}/subject/add',                                 'InsideController@addSubject')->before('auth');
Route::get('classroom/student/{studentID}/subject/add/{subjectID}',                     'InsideController@addSubject')->before('auth');
Route::get('classroom/student/{studentID}/subject/{subjectID}',                         'InsideController@loadSubject')->before('auth');
Route::get('classroom/student/{studentID}/observation/{observationID}/goal/{goalID}',   'InsideController@loadObservation')->before('auth');
Route::get('classroom/student/{studentID}/observation/{observationID}/goal/{goalID}/observation/add', 'InsideController@addObservation')->before('auth');


Route::post('classroom/student/{studentID}/subject/add',                                'InsideController@addSubject')->before('auth');
Route::post('classroom/student/{studentID}/observation/{observationID}/goal/{goalID}',  'InsideController@saveObservation')->before('auth');

/*
|--------------
| Login Routes 
|--------------
*/

// Show the login form
Route::get('login', array('as' => 'login', 'uses' => 'HomeController@showWelcome'))->before('guest');

// Log the users in
Route::post('login', function () {

	$user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );
    
    if (Auth::attempt($user)) {
        return Redirect::to('inside')
            ->with('flash_notice', 'You are successfully logged in.');
    }
    
    // authentication failure! lets go back to the login page
    return Redirect::route('login')
        ->with('flash_notice', 'Your username/password combination was incorrect.')
        ->withInput();

})->before('guest');

// Log the users out
Route::get('logout', array('as' => 'logout', function () {

    Auth::logout();

    return Redirect::route('home')
        ->with('flash_notice', 'You are successfully logged out.');

}))->before('auth');

// Registration views
Route::get('register', array('as' => 'register', 'uses' => 'HomeController@showRegister'))->before('guest');
Route::post('register', 'HomeController@doRegister');
Route::get('profile', array('as' => 'profile', 'uses' => 'HomeController@viewProfile'))->before('auth');



/**
 * Setup some route filters for handling basic authentication groups
 */
Route::filter('auth', function()
{
    if (Auth::guest())
        return Redirect::route('login')
        	->with('flash_error', 'You must be logged in to view this page');
});

Route::filter('guest', function()
{
	if(!Auth::guest())
		return Redirect::to('inside')
			->with('flash_notice', 'You are already logged in');
});

Route::filter('admin', function()
{
    if (Auth::guest())
        return Redirect::route('login')
        	->with('flash_error', 'You must be logged in to view this page');

    if(Auth::user()->admin !== 1)
    	return Redirect::route('login')
    	->with('flash_error', 'You do not have permission to perform that action');
});