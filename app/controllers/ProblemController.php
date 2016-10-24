<?php

class ProblemController extends \BaseController {

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
	public function store($contest_id)
	{
		//Validate problem
		if(Problem::isValid(Input::all()))
		{
			if(Problem::store(Input::all(), $contest_id))
			{
				$path = "/dashboard/challenges/$contest_id";
				//dd($path);
				return Redirect::to($path)->with('flash_message','Problem Added Successfully!');
			}
			else
			{
				dd("Server problem... Please try again later!");
			}
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',Problem::$errors." Please try again...");
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
	public function edit($id)
	{
		//
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
	public function destroy($id)
	{
		//
	}


}
