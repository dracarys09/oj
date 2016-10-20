<?php

class Instructor extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'instructors';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('user_id','roll');


	/**
	*	Contains errors if validation fails.
	*
	*	@var array
	*/
	public static $errors;


	/**
	*	Set of rules used to validate a user.
	*
	*	@var array
	*/
	public static $rules	=	[

					'roll'					=>	'unique:instructors'
	];


	public static function isValid($data)
	{
		$validation = Validator::make($data, static::$rules);
		if($validation->passes())
			return true;
		static::$errors = $validation->messages();
		return false;
	}


	public function store($roll, $user_id)
	{
		$instructor = new Instructor;
		$instructor->roll = $roll;
		$instructor->user_id = $user_id;
		if($instructor->save())
			return true;
		return false;
	}



}
