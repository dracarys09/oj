<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function login()
	{
		//dd(Input::all());
		$attempt = Auth::attempt(array(
			'email'			=>	Input::get('email'),
			'password'	=>	Input::get('password')
		));

		if($attempt)
		{
			dd("Login Successful!");
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',"Invalid Credentials...Please try again!");
		}

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
				dd("success");
			}
			else
			{
				dd("fail");
			}
		}
		else
		{
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
