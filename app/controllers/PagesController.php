<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			return Redirect::route('dashboard');
		}

		return View::make('home');
	}

	public function dashboard()
	{
		//instructor
		if(Auth::user()->type == "0")
		{
			return Redirect::route('instructor_dashboard');
		}
		//student
		else
		{
			return Redirect::route('student_dashboard');
		}
	}

	public function student_dashboard()
	{
		$user = Auth::user();
		$student = Student::get_student_by_user_id($user->id);

		return View::make('student.dashboard')->with('user',$user)->with('student',$student);
	}

	public function instructor_dashboard()
	{
		//dd("instructor_dashboard");
		$user = Auth::user();
		$instructor = Instructor::get_instructor_by_user_id($user->id);
		return View::make('instructor.dashboard')->with('user',$user)->with('instructor',$instructor);
	}

	public function challenges()
	{
		$user = Auth::user();
		$instructor = Instructor::get_instructor_by_user_id($user->id);
		$future_contests = Challenge::get_future_challenges(Auth::user()->id);
		$past_contests = Challenge::get_past_challenges(Auth::user()->id);
		return View::make('instructor.challenges')->with('user',$user)->with('instructor',$instructor)->with('future_contests',$future_contests)->with('past_contests',$past_contests);
	}

}
