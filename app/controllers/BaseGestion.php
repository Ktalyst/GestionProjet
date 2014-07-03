<?php 
 
abstract class BaseGestion
{
 
  protected $model;
  protected $validation;
 
	public function listePages($pages)
	{
		return $this->client->paginate($pages);
	}

}