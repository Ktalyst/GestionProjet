<?php

class Contrat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'code' => 'required',
		'contact_id' => 'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}
}
