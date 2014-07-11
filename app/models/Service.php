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

    public function units()
    {
        return $this->hasMany('Unit', 'service_id');
    }

    /**
     * Find by username, or throw an exception.
     *
     * @param string $nom The username.
     * @param mixed $columns The columns to return.
     *
     * @throws ModelNotFoundException if no matching Service exists.
     *
     * @return Service
     */
    public static function findByNameOrFail(
        $nom,
        $columns = array('*')
    ) {
        if ( ! is_null($service = static::whereNom($nom)->first($columns))) {
            return $service;
        }

        return false;
    }
}
