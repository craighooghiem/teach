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

	/**
	 * Load a list of classrooms belonging to the current user
	 */
	public function showHome()
	{
		$classrooms = Classroom::where('user_id', Auth::user()->id)->orderBy('order')->get();

		return View::make('inside.home')->with('classrooms', $classrooms);
	}

	/**
	 * Load a classroom and display the students belonging to the classroom.
	 */
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

	/**
	 * Load a single student and display their recent records
	 */
	public function loadStudent($student_id)
	{
		$student = Student::find($student_id);
		if($student)
		{
			$students = Student::where('classroom_id', $student->classroom_id)->with('subjects')->get();
			return View::make('inside.student')->with('student', $student)->with('students', $students);
		}
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Student coult not be found');
		}
	}

	/**
	 * Add a new Subject to the system
	 */
	public function addSubject($student_id, $subject_id = null)
	{
		$student = Student::find($student_id);
		if($student)
		{
			if(Input::has('subject_name'))
			{
				$subject = new Subject;
				$subject->name = Input::get('subject_name');
				$subject->user_id = Auth::user()->id;
				$student->subjects()->save($subject);
			}
			elseif(!is_null($subject_id))
			{
				$subject = Subject::find($subject_id);
				if($subject)
					$student->subjects()->save($subject);
			}
			else
			{
				$students = Student::where('classroom_id', $student->classroom_id)->get();
				$subjects = DB::table('subjects')->where('user_id', Auth::user()->id)->orderBy('name', 'asc')->groupBy('name')->get();
				return View::make('inside.add.subject')->with('student', $student)->with('students', $students)->with('subjects', $subjects);
			}

			return Redirect::to('classroom/student/'.$student->id)->with('flash_notice', 'Student Subjects Updated');
		}
	}

	/**
	 * Load a single subject for a user and display goals and objectives
	 */
	public function loadSubject($student_id, $subject_id)
	{
		$student = Student::find($student_id);
		$subject = Subject::find($subject_id);
		if($student && $subject)
		{
			$goals = $subject->goals()->where('student_id', $student->id)->with('observations')->with('observations.steps')->get();
			$students = Student::where('classroom_id', $student->classroom_id)->get();
			return View::make('inside.subject')->with('student', $student)->with('goals', $goals)->with('students', $students);
		}
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Student could not be found');
		}
	}

	/**
	 * Add a new observation
	 */
	public function addObservation($student_id, $observation_id, $goal_id)
	{
		$student = Student::find($student_id);
		$observation = Observation::find($observation_id);
		$goal = Goal::find($goal_id);
		if($student && $observation && $goal)
		{
			// Load a Steps Form
		}
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Student could not be found');
		}
	}

	/**
	 * Load an existing observation
	 */
	public function loadObservation($student_id, $observation_id, $goal_id)
	{
		$student = Student::find($student_id);
		$observation = Observation::find($observation_id);
		$goal = Goal::find($goal_id);
		if($student && $observation && $goal)
		{
			$students = Student::where('classroom_id', $student->classroom_id)->get();
			return View::make('inside.observation')
				->with('student', $student)->with('observation', $observation)->with('goal', $goal)->with('students', $students);
		}
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Student could not be found');
		}
	}

	/**
	 * Save an existing or new observation
	 */
	public function saveObservation($student_id, $observation_id, $goal_id)
	{
		$student = Student::find($student_id);
		$observation = Observation::find($observation_id);
		$goal = Goal::find($goal_id);

		if($student && $goal && $observation)
		{
			// Existing Observation
			$observation->description = Input::get('description');
			$observation->save();
			return Redirect::to('classroom/student/'.$student->id.'/observation/'.$observation->id.'/goal/'.$goal->id)
				->with('flash_notice', 'Observation Updated');
		}
		else
		{
			return Redirect::to('inside')->with('flash_notice', 'Student could not be found');
		}
	}

}