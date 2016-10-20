<?php

class Student extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

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
		*	Set of rules used to validate a student.
		*
		*	@var array
		*/
		public static $rules	=	[

						'roll'					=>	'unique:students'
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
			$student = new Student;
			$student->roll = $roll;
			$student->user_id = $user_id;
			if($student->save())
				return true;
			return false;
		}

}
