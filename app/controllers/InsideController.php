<?php

class InsideController extends BaseController {

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
		Asset::add('normalize', 		'css/normalize.css');
		Asset::add('foundation', 		'css/foundation.min.css');
		Asset::add('style', 			'css/style.css');
		Asset::add('foundation', 		'js/foundation.min.js');
		Asset::add('foundation.forms', 	'js/foundation/foundation.forms.js');
	}

	var $layout = 'layouts.inside';

	public function showHome()
	{
		$classrooms = Classroom::where('user_id', Auth::user()->id)->orderBy('order')->get();

		return View::make('inside.home')->with('classrooms', $classrooms);
	}

	public function loadClassroom($classroom_id)
	{
		$classroom = Classroom::find($classroom_id);
		if($classroom && $classroom->user_id == Auth::user()->id)
		{
			$students = Student::where('classroom_id', $classroom->id)->get();
			return View::make('inside.classroom')->with('students', $students)->with('classroom', $classroom);
		}	
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Classroom could not be found');
		}
	}

}