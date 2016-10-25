<?php

class ChallengeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validate Challenge
		if(Challenge::isValid(Input::all()))
		{
			if(Challenge::store(Input::all(),Auth::user()->id))
			{
				return Redirect::route('challenges')->with('flash_message','Challenge Created Successfully...You can now add problems.');
			}
			else
			{
				dd("Server problem... Please try again later!");
			}
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',Challenge::$errors." Please try again...");
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($contest_name)
	{
		$contest = Challenge::get_challenge_by_name($contest_name);
		$user = Auth::user();
		$problems = Problem::get_problems_for_challenge($contest->id);
		return View::make('instructor.add_problems')->with('contest',$contest)->with('user',$user)->with('problems',$problems);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($challenge_id)
	{
		
	}


}
