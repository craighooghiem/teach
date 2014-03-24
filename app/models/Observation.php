<?php

class Observation extends Eloquent {

	protected $table = 'observations';

	// Model Relationships
	public function goal()
	{
		return $this->belongsTo('Goal');
	}

	public function steps()
	{
		return $this->hasMany('Step');
	}

}