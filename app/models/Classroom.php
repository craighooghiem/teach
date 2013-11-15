<?php

class Classroom extends Eloquent {

	protected $table = 'classrooms';

	// Model Relationships
	public function students()
	{
		return $this->hasMany('Student');
	}

}