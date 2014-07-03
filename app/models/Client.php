<?php

class Client extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required'
	);

	public function contacts()
	{
		return $this->hasMany('Contact', 'client_id');
	}

	public function contrats()
	{
		return $this->hasManyThrough('Contrat', 'Contact');
	}
}
