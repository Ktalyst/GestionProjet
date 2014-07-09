<?php

class Catalogue extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required',
		'code' => 'required'
	);

	public function serviceRequestTypes()
	{
		return $this->hasMany('serviceRequestType', 'catalogue_id');
	}

    /**
     * Find by username, or throw an exception.
     *
     * @param string $nom The username.
     * @param mixed $columns The columns to return.
     *
     * @throws ModelNotFoundException if no matching User exists.
     *
     * @return User
     */
    public static function findByNameOrFail(
        $nom,
        $columns = array('*')
    ) {
        if ( ! is_null($catalogue = static::whereNom($nom)->first($columns))) {
            return $catalogue;
        }

        throw new ModelNotFoundException;
    }


}
