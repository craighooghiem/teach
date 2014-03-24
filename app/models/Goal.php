<?php

class Goal extends Eloquent {

	protected $table = 'goals';

	// Model Relationships
	public function observations()
	{
		return $this->hasMany('Observation');
	}

	public function subject()
	{
		return $this->belongsTo('Subject');
	}

}