<?php

class Item extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'dateRecu' => 'required',
		'montant' => 'required',
		'description' => 'required',
		'id_commande' => 'required'
	);
}
