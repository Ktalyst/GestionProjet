<?php

class ServiceRequestComplexity extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'code' => 'required',
	);

	public function Catalogue()
	{
		return $this->belongsTo('Catalogue');
	}

    public function units()
    {
        return $this->hasMany('Unit', 'serviceRequestComplexity_id');
    }

    /**
     * Find by username, or throw an exception.
     *
     * @param string $nom The username.
     * @param mixed $columns The columns to return.
     *
     * @throws ModelNotFoundException if no matching ServiceRequestComplexity exists.
     *
     * @return ServiceRequestComplexity
     */
    public static function findByNameOrFail(
        $nom,
        $columns = array('*')
    ) {
        if ( ! is_null($ServiceRequestComplexity = static::whereNom($nom)->first($columns))) {
            return $ServiceRequestComplexity;
        }

        throw new ModelNotFoundException;
    }
}
