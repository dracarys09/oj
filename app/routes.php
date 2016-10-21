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

Route::get('/dashboard',array(

	'as'	=>	'instructor_dashboard',
	'uses'=>	'PagesController@instructor_dashboard'

))->before('auth');

Route::get('/dashboard',array(

	'as'	=>	'student_dashboard',
	'uses'=>	'PagesController@student_dashboard'

))->before('auth');
































//
