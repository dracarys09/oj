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
		//$user = Auth::user();
		//$student = Student::get_student_by_user_id($user->id);

		//return View::make('student.dashboard')->with('user',$user)->with('student',$student);

		return Redirect::route('challenges');
	}

	public function instructor_dashboard()
	{
		//dd("instructor_dashboard");
		//$user = Auth::user();
		//$instructor = Instructor::get_instructor_by_user_id($user->id);
		//return View::make('instructor.dashboard')->with('user',$user)->with('instructor',$instructor);
		return Redirect::route('challenges');
	}

	public function challenges()
	{
		$user = Auth::user();
		if($user->type == "0")
		{
			$instructor = Instructor::get_instructor_by_user_id($user->id);
			$future_contests = Challenge::get_future_challenges(Auth::user()->id);
			$past_contests = Challenge::get_past_challenges(Auth::user()->id);
			$present_contests = Challenge::get_present_challenges(Auth::user()->id);
			return View::make('instructor.challenges')->with('user',$user)->with('present_contests',$present_contests)->with('instructor',$instructor)->with('future_contests',$future_contests)->with('past_contests',$past_contests);
		}
		else
		{
			$student = Student::get_student_by_user_id($user->id);
			$future_contests = Challenge::get_all_future_challenges();
			$past_contests = Challenge::get_all_past_challenges();
			$present_contests = Challenge::get_all_present_challenges();
			return View::make('student.challenges')->with('user',$user)->with('present_contests',$present_contests)->with('student',$student)->with('future_contests',$future_contests)->with('past_contests',$past_contests);
		}
	}

	public function show_results($challenge_id, $user_id, $problem_id)
	{
		$solutions = Solution::get_all_submitted_solutions($user_id, $problem_id);
		$user = Auth::user();
		$problem = Problem::get_problem_by_id($problem_id);
		return View::make('student.results')->with('user',$user)->with('solutions',$solutions)->with('problem',$problem);
	}

	public function show_solution($solution_id)
	{
		$solution = Solution::get_solution_by_id($solution_id);
		$path = $solution->submitted_file_path;
		$user = Auth::user();

		return View::make('student.show_solution')->with('user',$user)->with('path',$path);
	}

}
