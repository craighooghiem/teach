<?php

use Illuminate\Database\Migrations\Migration;

class BaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create all the base tables
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('username');
		    $table->string('email');
		    $table->string('password');
		    $table->integer('school_id');
		    $table->timestamps();
		});

		Schema::create('schools', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('city');
		    $table->integer('account_type');
		    $table->timestamps();
		});

		Schema::create('students', function($table)
		{
		    $table->increments('id');
		    $table->string('fname');
		    $table->string('lname');
		    $table->integer('user_id');
		    $table->timestamps();
		});

		Schema::create('subjects', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->integer('user_id');
		    $table->timestamps();
		});

		Schema::create('goals', function($table)
		{
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->integer('subject_id');
		    $table->integer('student_id');
		    $table->string('name');
		    $table->string('status');
		    $table->text('description');
		    $table->timestamps();
		});

		Schema::create('observations', function($table)
		{
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->integer('goal_id');
		    $table->string('name');
		    $table->text('description');
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
		// Delete all the base tables
		
	}

}