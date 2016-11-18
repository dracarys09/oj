<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResultsColumnToSolutionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('solutions', function(Blueprint $table)
		{
			//Add results column
			$table->string("result",50);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('solutions', function(Blueprint $table)
		{
			//Drop result column
			$table->dropColumn("result");
		});
	}

}
