<?php

class Tache extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'pourcentage' => 'required',
		'service_id' => 'required'
	);

	public function service()
	{
		return $this->belongsTo('Service');
	}
}
