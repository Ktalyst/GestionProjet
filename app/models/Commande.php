<?php

class Commande extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'id_contrat' => 'required'
	);
}
