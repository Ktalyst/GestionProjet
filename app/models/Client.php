<?php

class Client extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required'
	);

	public function clientContacts()
	{
		return $this->hasMany('Contact');
	}

	public function ClientContrats()
	{
		return $this->hasManyThrough('Contrat', 'Contact');
	}
}
