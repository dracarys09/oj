<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('score', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('challenge_id');
			$table->integer('problem_id');
			$table->integer('student_id');
			$table->integer('points');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('score');
	}

}
