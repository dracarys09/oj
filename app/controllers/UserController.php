<?php

class UserController extends \BaseController {


	public function login()
	{
		//dd(Input::all());
		$attempt = Auth::attempt(array(
			'email'			=>	Input::get('email'),
			'password'	=>	Input::get('password')
		));

		if($attempt)
		{
			//dd("Login Successful!");
			$type = Auth::user()->type;

			//Instructor
			if($type == "0")
			{
				//dd("Inside User Controller and Instructor type");
				return Redirect::route('instructor_dashboard');
			}
			//Student
			else
			{
				return Redirect::route('student_dashboard');
			}
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',"Invalid Credentials...Please try again!");
		}

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validate user
		if(User::isValid(Input::all()))
		{
			if(User::store(Input::all()))
			{
				/* Redirecting to home page if registration is successful */
				return Redirect::to('/')->with('flash_message',"Registration Successful...You can now login!");
			}
			else
			{
				dd("Server problem... Please try again later!");
			}
		}
		else
		{
			//dd(User::$errors);
			return Redirect::back()->withInput()->with('flash_message',User::$errors." Please try again...");
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
