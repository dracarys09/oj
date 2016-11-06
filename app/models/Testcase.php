<?php

class Testcase extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'testcases';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('problem_id','input_file_path','output_file_path','visible');

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

					'input_file'		=>	'required',
					'output_file'		=>	'required'
	];


	public static function isValid($data)
	{
		$validation = Validator::make($data,static::$rules);
		if($validation->passes())
		{
			return true;
		}
		static::$errors = $validation->messages();
		return false;
	}


	public static function store($data)
	{

	}


}
