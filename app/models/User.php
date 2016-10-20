<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('name','dept','email','password','type');

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
					'email'					=>	'required|unique:users',
					'password'			=>	'required',
					'password_again'=>	'required|same:password',
					'department'		=>	'required',
					'type'					=>	'required',
					'roll'					=>	'required'
	];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



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

	public static function store($data)
	{
		$user = new User;

		$user->name 				=	$data['name'];
		$user->department 	=	$data['department'];
		$user->email 				=	$data['email'];
		$user->type 				=	$data['type'];
		$user->password 		=	Hash::make($data['password']);


		//Save data in respective tables
		if($user->save())
		{
			$user_id = User::get_user_by_email($data['email'])->id;
			//Instructor
			if($data['type'] == "0")
			{
				//save data in instructors table
				$instructor = new Instructor;
				if(Instructor::isValid($data))
				{
					if(Instructor::store($data['roll'],$user_id))
						return true;
					return false;
				}
				return false;
			}
			//Student
			else if($data['type'] == "1")
			{
				//save data in students table
				$student = new Student;
				if(Student::isValid($data))
				{
					if(Student::store($data['roll'],$user_id))
						return true;
					return false;
				}
				return false;
			}
		}
		return false;

	}

	public static function get_user_by_email($email)
	{
		$user = User::where('email','=',$email)->first();
		return $user;
	}

}
