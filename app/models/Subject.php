<?php

class Subject extends Eloquent {

	protected $table = 'subjects';

	// Model Relationships
	public function students()
	{
		return $this->hasMany('Student');
	}

	public function goals()
	{
		return $this->hasMany('Goal');
	}

}