<?php

use Models\Auteur;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB as DB;

class ClientsGestion extends \BaseGestion {

	protected $contacts;

	/**
	 * Client Repository
	 *
	 * @var Client
	 */
	protected $client;

	public function __construct(Client $client, Contact $contacts, ClientsValidation $validation)
	{
		$this->client = $client;
		$this->contacts = $contacts;
		$this->validation = $validation;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = $this->client->all();

		//return View::make('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return array(
			'select_contacts' => $this->contacts->lists('nom', 'id'),
		);  
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if($this->validation->with(Input::all())->passes())
		{				
			$client = new $this->client;
			$client->nom = Input::get('nom');
			DB::transaction(function() use($client)
			{
				$client->save();
				if(Input::get('contact'))
				{
					$contacts = array_unique(Input::get('contact'));
					foreach($contacts as $contact_id)
					{
						$contact = $this->contacts->find($contact_id);
						//$client->contacts->add($contact);
						$contact->client()->associate($client);
						$contact->save();
					}
				}
			});				
			return true;
		}
		return $this->validation->errors();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = $this->model->find($id);
		return array(
			'client' => $client,
			'contacts' => $livre->contacts,
		);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$old = Input::old();
		$client = $this->client->find($id);
		$retour = array(
			'client' => $client,
			'select_contacts' => $this->contacts->lists('nom', 'id'),
		);		
		$retour['contacts'] = empty($old) ? $client->contacts->toArray(): $old['contact'];
		return $retour;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->validation->with(Input::all())->passes())
		{
			$client = $this->client->find($id);	
			DB::transaction(function() use($client)
			{
				/*if(Input::get('contact')){
					$contacts = array_unique(Input::get('contact'));
					foreach($client->contacts as $key){
						$client->contacts->pop();
					}
					foreach($contacts as $contact_id)
					{
						$contact = $this->contacts->find($contact_id);
						$client->contacts->add($contact);
						$contact->client()->associate($client);
						$contact->save();
					}
				}
				//$client->contacts()->save(Input::get('contact'));
				$client->nom = Input::get('nom');
				$client->save();*/

				$client->nom = Input::get('nom');
				$client->save();
			});
			return true;
		} 
		return $this->validation->errors();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = $this->client->find($id);
		DB::transaction(function() use($client)
		{
			//$client->contacts()->detach();
			$client->delete();
		});
	}

}
