<?php


class ClientsController extends BaseController {

	/**
	 * Client Repository
	 *
	 * @var Client
	 */
	protected $client;

	public function __construct(Client $client, Contact $contact)
	{
		$this->client = $client;
		$this->contact = $contact;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = $this->client->all();

		return View::make('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$nom = Input::get('nom');
		$input = array('nom' => $nom);
		$validation = Validator::make($input, Client::$rules);
		if ($validation->passes())
		{
			$client = $this->client->create($input);

			$contactnom= Input::get('contactnom');
			$contactprenom = Input::get('contactprenom');
			$contactadresse = Input::get('contactadresse');
			for($i = 1; $i <= count($contactnom); $i++)
			{
				$inputcontact = array('nom' => $contactnom[$i], 'prenom' => $contactprenom[$i], 'adresse' => $contactadresse[$i], 'client_id' => $client->id);
				$validationcontact = Validator::make($inputcontact, Contact::$rules);
				if ($validationcontact->passes())
				{
					$this->contact->create($inputcontact);
				}

			}

			return Redirect::route('clients.index');
		}

		return Redirect::route('clients.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = $this->client->findOrFail($id);

		return View::make('clients.show', compact('client'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->client->find($id);

		if (is_null($client))
		{
			return Redirect::route('clients.index');
		}

		return View::make('clients.edit', compact('client'), array('contacts' => $client->contacts));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = $this->client->find($id);
		$nom = Input::get('nom');
		$input = array('nom' => $nom);
		$validation = Validator::make($input, Client::$rules);

		if ($validation->passes())
		{
			$client->nom = $nom;
			$client->save();
			$contactnom= Input::get('contactnom');
			$contactprenom = Input::get('contactprenom');
			$contactadresse = Input::get('contactadresse');
			for($i = 0; $i < count($contactnom); $i++)
			{
				if($this->contact->findByNameOrFail($contactnom[$i]) == false) {
					$inputcontact = array('nom' => $contactnom[$i], 'prenom' => $contactprenom[$i], 'adresse' => $contactadresse[$i], 'client_id' => $client->id);
					$validationcontact = Validator::make($inputcontact, Contact::$rules);
					if ($validationcontact->passes())
					{
						$this->contact->create($inputcontact);
					}
				} else {
					$contact = $this->contact->findByNameOrFail($contactnom[$i]);
					$contact->client_id = $client->id;
					$contact->save();
				}
			}
			return Redirect::route('clients.index', $id);
		}
		return Redirect::route('clients.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->client->find($id)->delete();

		return Redirect::route('clients.index');
	}

}
