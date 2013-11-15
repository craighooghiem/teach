<?php

use Illuminate\Database\Migrations\Migration;

class ClassroomsUserId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('classrooms', function($table) {
			$table->integer('user_id');
		});

		Schema::table('students', function($table) {
			$table->integer('classroom_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}