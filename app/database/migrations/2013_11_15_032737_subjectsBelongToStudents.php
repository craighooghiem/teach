<?php

use Illuminate\Database\Migrations\Migration;

class SubjectsBelongToStudents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subjects', function($table){
			$table->dropColumn('user_id');
		});

		Schema::create('students_subjects', function($table) {
			$table->increments('id');
			$table->integer('student_id');
			$table->integer('subject_id');
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
		//
	}

}