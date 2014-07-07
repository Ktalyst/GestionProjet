<?php

class Contrat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'code' => 'required',
		'id_contact' => 'required'
	);

	public function contact()
	{
		return $this->belongsTo('Contact');
	}
}
