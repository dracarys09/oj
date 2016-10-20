<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestcasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testcases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('problem_id');
			$table->string('input_file_path',100);
			$table->string('output_file_path',100);
			$table->boolean('visible');
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
		Schema::drop('testcases');
	}

}
