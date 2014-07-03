<?php 

class ClientsController extends BaseResourceController {

	public function __construct(ClientsGestion $gestion)
	{
		parent::__construct();
    $this->gestion = $gestion;
    $this->base = class_basename(__NAMESPACE__);
    $this->message_store = 'Le client a été ajouté';
    $this->message_update = 'Le client a été modifié';
  }

}