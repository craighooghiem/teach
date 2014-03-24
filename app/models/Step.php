<?php

class Step extends Eloquent {

	protected $table = 'steps';

	// Model Relationships
	public function observation()
	{
		return $this->belongsTo('Observation');
	}

}