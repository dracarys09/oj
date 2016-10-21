<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRememberTokenColumnToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Add remember_token column
		Schema::table('users', function(Blueprint $table) {
			$table->rememberToken();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop rememberToken column
		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('remember_token');
    });
	}

}
