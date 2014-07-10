<?php

class Service extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'code' => 'required',
		'catalogue_id' => 'required',
	);

	public function Catalogue()
	{
		return $this->belongsTo('Catalogue');
	}
}
