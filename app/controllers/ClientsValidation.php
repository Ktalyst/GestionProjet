<?php 

class ClientsValidation extends BaseValidation {

	protected $rules = array(
		'nom' => 'required'
	);

	protected $messages = array(
		'nom.required' => 'Vous devez entrer un nom pour le client',
	);

}