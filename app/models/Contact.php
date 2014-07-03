<?php

class Contact extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'prenom' => 'required',
		'adresse' => 'required',
	);

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function ContactContrats()
	{
		return $this->hasMany('Contrat');
	}
}
