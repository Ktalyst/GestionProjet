<?php

class Item extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'dateRecu' => 'required',
		'montant' => 'required',
		'description' => 'required',
		'commande_id' => 'required'
	);
	public function commande()
	{
		return $this->belongsTo('Commande');
	}
}
