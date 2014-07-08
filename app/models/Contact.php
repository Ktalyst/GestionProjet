<?php

class Contact extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required|unique:contacts',
		'prenom' => 'required',
		'adresse' => 'required',
		'client_id' => 'required',
	);

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function contrats()
	{
		return $this->hasMany('Contrat', 'contact_id');
	}
}
