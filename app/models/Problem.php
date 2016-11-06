<?php

class Problem extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'problems';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('challenge_id','description','time_limit','memory_limit');
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

					'name'					=>	'required',
					'description'		=>	'required'

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


	public static function store($data,$contest_id)
	{

		$mem_limit = "256";
		$time_limit = "1";

		$problem = new Problem;

		$problem->challenge_id = $contest_id;
		$problem->description = $data['description'];
		$problem->title = $data['name'];

		if($data['memory_limit'] != "")
			$mem_limit = $data['memory_limit'];
		if($data['time_limit'] != "")
			$time_limit = $data['time_limit'];

		$problem->memory_limit = $mem_limit;
		$problem->time_limit = $time_limit;

		if($problem->save())
			return true;
		return false;
	}

	public static function get_problems_for_challenge($challenge_id)
	{
		$problems = Problem::where('challenge_id','=',$challenge_id)->get();
		return $problems;
	}

	public static function get_problem_by_id($problem_id)
	{
		$problem = Problem::find($problem_id);
		return $problem;
	}

	public static function delete_problem($problem_id)
	{
		$problem = Problem::find($problem_id);
		if($problem->delete())
			return true;
		return false;
	}

	public static function get_challenge_id($problem_id)
	{
		$problem = Problem::find($problem_id);
		return $problem->challenge_id;
	}


}
