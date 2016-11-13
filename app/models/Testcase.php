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


	public static function store($data, $problem_id, $challenge_id)
	{
		/*
		userdata/instructor/challenge_id/problem_id/in.txt
		userdata/instructor/challenge_id/problem_id/out.txt
		*/

		if(Input::hasFile('input_file') && Input::hasFile('output_file'))
		{
			$input_path = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
			$output_path = "userdata/instructor/".$challenge_id."/".$problem_id."/out"."/";

			$directory = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
			$files = glob($directory . '*.txt');


			if ( count($files) == 0 )
			{
				Input::file('input_file')->move($input_path,"0.txt");
				Input::file('output_file')->move($output_path,"0.txt");
			}
			else
			{
				$filecount = count( $files );

				Input::file('input_file')->move($input_path,$filecount.".txt");
				Input::file('output_file')->move($output_path,$filecount.".txt");
			}

			return true;
		}


	}


}
