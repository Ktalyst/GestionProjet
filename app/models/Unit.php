<?php

class Unit extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nombre' => 'required',
		'serviceRequestType_id' => 'required',
		'serviceRequestComplexity_id' => 'required',
		'service_id' => 'required'
	);

	public function service()
	{
		return $this->belongsTo('Service');
	}

	public function serviceRequestType()
	{
		return $this->belongsTo('ServiceRequestType');
	}

	public function serviceRequestComplexity()
	{
		return $this->belongsTo('ServiceRequestComplexity');
	}
}
