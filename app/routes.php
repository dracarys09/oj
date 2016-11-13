<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(

	'as'	=>	'index',
	'uses'=>	'PagesController@index'

));

Route::post('/register',array(

	'as'	=>	'register',
	'uses'=>	'UserController@store'

));

Route::post('/login',array(

	'as'	=>	'login',
	'uses'=>	'UserController@login'

));

Route::get('/logout',array(

	'as'	=>	'logout',
	'uses'=>	'UserController@logout'

));

Route::get('/dashboard/user',array(

	'as'	=>	'dashboard',
	'uses'=>	'PagesController@dashboard'

))->before('auth');

Route::get('/dashboard/instructor',array(

	'as'	=>	'instructor_dashboard',
	'uses'=>	'PagesController@instructor_dashboard'

))->before('auth');

Route::get('/dashboard/student',array(

	'as'	=>	'student_dashboard',
	'uses'=>	'PagesController@student_dashboard'

))->before('auth');

Route::get('/dashboard/challenges',array(

	'as'	=>	'challenges',
	'uses'=>	'PagesController@challenges'

))->before('auth');

Route::post('/dashboard/challenges',array(

	'as'	=>	'create_challenge',
	'uses'=>	'ChallengeController@store'

))->before('auth');

Route::get('/dashboard/challenges/show/{contest_name}',array(

	'as'	=>	'show_challenge',
	'uses'=>	'ChallengeController@show'

))->before('auth');

Route::get('dashboard/challenges/problems/{problem_id}',array(

	'as'	=>	'show_problem',
	'uses'=>	'ProblemController@show'

))->before('auth');

Route::post('dashboard/challenges/problems/{problem_id}',array(

	'as'	=>	'submit_solution',
	'uses'=>	'ProblemController@evaluate'

))->before('auth');

Route::post('/dashboard/challenges/add_problem/{contest_id}',array(

	'as'	=>	'add_problem',
	'uses'=>	'ProblemController@store'

))->before('auth');

Route::get('/dashboard/challenges/{contest_name}',array(

	'as'	=>	'edit_problems',
	'uses'=>	'ChallengeController@edit'

))->before('auth');

Route::get('/dashboard/delete/{challenge_id}',array(

	'as'	=>	'delete_challenge',
	'uses'=>	'ChallengeController@destroy'

))->before('auth');

Route::get('dashboard/deleteproblem/{problem_id}',array(

	'as'	=>	'delete_problem',
	'uses'=>	'ProblemController@destroy'

))->before('auth');

Route::post('/dashboard/challenges/edit_problems/{problem_id}',array(

	'as'	=>	'add_testcase',
	'uses'=>	'ProblemController@add_testcase'

))->before('auth');


























//
