<?php

class Img extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'img';

	/**
	*	Fillable attributes of users table.
	*
	*	@var array
	*/
	protected $fillable = array('problem_id','path');


}
