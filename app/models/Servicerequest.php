<?php

class Servicerequest extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'id_item' => 'required'
	);
}
