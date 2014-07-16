<?php

class Contact extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nom' => 'required|unique:contacts',
		'prenom' => 'required',
		'adresse' => 'required',
		'client_id' => 'required',
	);

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function contrats()
	{
		return $this->hasMany('Contrat', 'contact_id');
	}

    /**
     * Find by username, or throw an exception.
     *
     * @param string $nom The username.
     * @param mixed $columns The columns to return.
     *
     *
     * @return ServiceRequestComplexity
     */
    public static function findByNameOrFail(
        $nom,
        $columns = array('*')
    ) {
        if ( ! is_null($Contact = static::whereNom($nom)->first($columns))) {
            return $Contact;
        }

        return false;
    }
}
