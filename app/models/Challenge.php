<?php

class Challenge extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'challenges';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('user_id','start','end','name');

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

					'name'					=>	'required|unique:challenges',
					'start'					=>	'required|before:end',
					'end'		        => 	'required'
	];

	public static function isValid($data)
	{

		$validation = Validator::make($data,static::$rules);

		if($validation->passes())
		{
			return true;
		}

		static::$errors 	=	$validation->messages();

		return false;
	}

	public static function store($data,$user_id)
	{
		$challenge = new Challenge;
		$challenge->user_id = $user_id;
		$challenge->start = $data['start'];
		$challenge->end = $data['end'];
		$challenge->name = $data['name'];

		if($challenge->save())
			return true;
		return false;
	}


	public static function get_future_challenges($user_id)
	{
		$curr_date = date('Y-m-d h:i:s', time());
		$future_contests = Challenge::where("start",">",$curr_date)->where('user_id','=',$user_id)->get();
		return $future_contests;
	}

	public static function get_present_challenges($user_id)
	{
		$curr_date = date('Y-m-d h:i:s', time());
		$present_contests = Challenge::where("start","<=",$curr_date)->where("end",">",$curr_date)->where('user_id','=',$user_id)->get();
		return $present_contests;
	}

	public static function get_past_challenges($user_id)
	{
		$curr_date = $date = date('Y-m-d h:i:s', time());
		$past_contests = Challenge::where("end","<",$curr_date)->where('user_id','=',$user_id)->get();
		return $past_contests;
	}

	public static function get_all_present_challenges()
	{
		$curr_date = $date = date('Y-m-d h:i:s', time());
		$present_contests = Challenge::where("start","<=",$curr_date)->where("end",">=",$curr_date)->get();
		return $present_contests;
	}

	public static function get_challenge_by_name($challenge_name)
	{
		$contest = Challenge::where('name','=',$challenge_name)->first();
		return $contest;
	}

	public static function get_challenge_by_id($challenge_id)
	{
		$contest = Challenge::find($challenge_id);
		return $contest;
	}

	public static function delete_challenge($challenge_id)
	{

		//dd($challenge_id);
		$challenge = Challenge::find($challenge_id);
		if($challenge->delete())
			return true;
		return false;
	}

	public static function get_all_future_challenges()
	{
		$curr_date = date('Y-m-d h:i:s', time());
		$future_contests = Challenge::where("start",">",$curr_date)->get();
		return $future_contests;
	}

	public static function get_all_past_challenges()
	{
			$curr_date = $date = date('Y-m-d h:i:s', time());
			$past_contests = Challenge::where("end","<",$curr_date)->get();
			return $past_contests;
	}

	public static function get_contest_name($problem_id)
	{
		$challenge_id = Problem::get_challenge_id($problem_id);
		$challenge = Challenge::find($challenge_id);
		return $challenge->name;
	}

	public static function get_challenge_id_for_problem($problem_id)
	{
		$challenge_id = Problem::get_challenge_id($problem_id);
		return $challenge_id;
	}

}
