<?php

use Illuminate\Database\Migrations\Migration;

class ClassroomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classrooms', function($table){
			$table->increments('id');

			$table->string('title', 555);
			$table->integer('order');

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