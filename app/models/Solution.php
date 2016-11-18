<?php

class Solution extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'solutions';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('student_id','problem_id','submitted_file_path','result');


	public static function store($user_id, $problem_id, $db_path, $result)
	{
		$solution = new Solution;
		$solution->student_id = $user_id;
		$solution->problem_id = $problem_id;
		$solution->submitted_file_path = $db_path;
		$solution->result = $result;

		if($solution->save())
		{
			return true;
		}
		return false;
	}

	public static function get_all_submitted_solutions($user_id, $problem_id)
	{
		$solutions = Solution::where('student_id','=',$user_id)->where('problem_id','=',$problem_id)->orderBy('created_at','desc')->get();
		return $solutions;
	}

	public static function get_solution_by_id($solution_id)
	{
		$solution = Solution::find($solution_id);
		return $solution;
	}

}
