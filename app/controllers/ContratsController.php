<?php

class ContratsController extends BaseController {

	/**
	 * Contrat Repository
	 *
	 * @var Contrat
	 */
	protected $contrat;

	public function __construct(Contrat $contrat)
	{
		$this->contrat = $contrat;
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
		return View::make('contrats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
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

		if (is_null($contrat))
		{
			return Redirect::route('contrats.index');
		}

		return View::make('contrats.edit', compact('contrat'));
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
		$validation = Validator::make($input, Contrat::$rules);

		if ($validation->passes())
		{
			$contrat = $this->contrat->find($id);
			$contrat->update($input);

			return Redirect::route('contrats.show', $id);
		}

		return Redirect::route('contrats.edit', $id)
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
		$this->contrat->find($id)->delete();

		return Redirect::route('contrats.index');
	}

}