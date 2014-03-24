<?php

class Student extends Eloquent {

	protected $table = 'students';

	// Model Relationships
	public function classroom()
	{
		return $this->belongsTo('Classroom');
	}

	public function subjects()
	{
		return $this->belongsToMany('Subject');
	}

}