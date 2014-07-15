<?php

class TachesController extends BaseController {

	/**
	 * Tach Repository
	 *
	 * @var Tach
	 */
	protected $Tache;

	public function __construct(Tache $Tache, Service $service)
	{
		$this->Tache = $Tache;
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Taches = $this->Tache->all();

		return View::make('taches.index', compact('Taches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('taches.create', array('select' => $this->service->all()->lists('nom', 'id')));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tache::$rules);

		if ($validation->passes())
		{
			$this->Tache->create($input);

			return Redirect::route('taches.index');
		}

		return Redirect::route('taches.create')
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
		$Tache = $this->Tache->findOrFail($id);

		return View::make('taches.show', compact('Tache'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Tache = $this->Tache->find($id);

		if (is_null($Tache))
		{
			return Redirect::route('taches.index');
		}

		return View::make('taches.edit', compact('Tache'));
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
		$validation = Validator::make($input, Tache::$rules);

		if ($validation->passes())
		{
			$Tache = $this->Tache->find($id);
			$Tache->update($input);

			return Redirect::route('taches.show', $id);
		}

		return Redirect::route('taches.edit', $id)
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
		$this->Tache->find($id)->delete();

		return Redirect::route('taches.index');
	}

}
