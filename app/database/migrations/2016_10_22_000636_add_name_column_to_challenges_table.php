<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameColumnToChallengesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('challenges', function(Blueprint $table)
		{
			//Add name column
			$table->string("name",50);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('challenges', function(Blueprint $table)
		{
			//Drop name column
			$table->dropColumn("name");
		});
	}

}
