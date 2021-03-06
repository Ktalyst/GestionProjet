<?php 


class ContactsController extends BaseController {

	/**
	 * Contact Repository
	 *
	 * @var Contact
	 */
	protected $client;

	public function __construct(Contact $contact, Client $client)
	{
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
		$contacts = $this->contact->all();

		return View::make('contacts.index', compact('contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contacts.create', array('select' => $this->client->all()->lists('nom', 'id')));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$contacts = $this->contact->all();
		$input = Input::all();
		$validation = Validator::make($input, Contact::$rules);
		if ($validation->passes())
		{
			$this->contact->create($input);
			return Redirect::route('contacts.create');
		}

		return Redirect::route('contacts.create')
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
		$this->contact->find($id)->delete();
		return Redirect::to(URL::previous());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contact = $this->contact->find($id);

		if (is_null($contact))
		{
			return Redirect::route('contacts.index');
		}

		return View::make('contacts.edit',array(
			'contact' => $contact,
			'select' => $this->client->all()->lists('nom', 'id')
		));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Contact::$rules);

		if ($validation->passes())
		{
			$contact = $this->contact->find($id);
			$contact->update($input);

			return Redirect::route('clients.edit', $contact->client->id);
		}

		return Redirect::route('contacts.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * 
	 */
	public function destroy($id)
	{
		$contact = $this->contact->find($id);
		$contact->delete();
		return Redirect::to(URL::previous())->withInput();
	}

}
