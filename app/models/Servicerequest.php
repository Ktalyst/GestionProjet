<?php

class Servicerequest extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'item_id' => 'required',
		'servicerequesttype_id' => 'required',
		'servicerequestcomplexity_id' => 'required',
	);

    public function services()
    {
        return $this->belongsToMany('Service')->withPivot('nombreUO');
    }
}
