<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('home');
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
		//dd($user);
		return View::make('instructor.dashboard')->with('user',$user)->with('instructor',$instructor);
	}

}
