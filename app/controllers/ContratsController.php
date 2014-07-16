<?php

class ContratsController extends BaseController {

	/**
	 * Contrat Repository
	 *
	 * @var Contrat
	 */
	protected $contrat;

	public function __construct(Contrat $contrat, Contact $contact, Client $client)
	{
		$this->contrat = $contrat;
		$this->contact = $contact;
		$this->client = $client;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contrats = $this->contrat->all();

		return View::make('contrats.index', compact('contrats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contrats.create', 
			array('selectcontact' => $this->contact->all()->lists('nom', 'id'), 
				'selectclient' => $this->client->all()->lists('nom', 'id')));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$contact = Input::get('contact_id');
		$nom = Input::get('nom');
		$code = Input::get('code');

		$input=(array("nom" => $nom, "code" => $code, 'contact_id' => $contact));
		$validation = Validator::make($input, Contrat::$rules);
		if ($validation->passes())
		{
			$this->contrat->create($input);
			return Redirect::route('contrats.index');
		}
		return Redirect::route('contrats.create')
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
		$contrat = $this->contrat->findOrFail($id);

		return View::make('contrats.show', compact('contrat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contrat = $this->contrat->find($id);
		$client = $contrat->contact->client;
		$contacts = $client->contacts;

		if (is_null($contrat))
		{
			return Redirect::route('contrats.index');
		}

		return View::make('contrats.edit', compact('contrat'), array('select' => $contacts->lists('nom', 'id')));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = Input::get('contact_id');
		$nom = Input::get('nom');
		$code = Input::get('code');
		$input=(array("nom" => $nom, "code" => $code, 'contact_id' => $contact));
		$contrat = $this->contrat->find($id);
		$contrat->update($input);



		return Redirect::route('contrats.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->contrat->find($id)->delete();

		return Redirect::route('contrats.index');
	}

}
