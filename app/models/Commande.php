<?php

class Commande extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'contrat_id' => 'required'
	);

	public function contrat()
	{
		return $this->belongsTo('Contrat');
	}

	public function items()
	{
		return $this->hasMany('Item', 'commande_id');
	}
}
