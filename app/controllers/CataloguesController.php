<?php

class CataloguesController extends BaseController {

	/**
	 * Catalogue Repository
	 *
	 * @var Catalogue
	 */
	protected $Catalogue;

	public function __construct(Catalogue $Catalogue, ServiceRequestType $serviceRequestType)
	{
		$this->Catalogue = $Catalogue;
		$this->ServiceRequestType = $serviceRequestType;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Catalogues = $this->Catalogue->all();

		return View::make('catalogues.index', compact('Catalogues'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('catalogues.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$nom = Input::get('nom');
		$code = Input::get('code');
		$input = array('nom' => $nom, 'code' => $code);
		$this->Catalogue->create($input);
		$catalogue = $this->Catalogue->findByNameOrFail($nom);

		$nomsrt= Input::get('srtnom');
		$codesrt = Input::get('srtcode');
		for($i = 1; $i <= count($nomsrt); $i++)
		{
			$inputsrt = array('nom' => $nomsrt[$i], 'code' => $codesrt[$i], 'catalogue_id' => $catalogue->id);
			$this->ServiceRequestType->create($inputsrt);
		}

			return Redirect::route('catalogues.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Catalogue = $this->Catalogue->findOrFail($id);

		return View::make('catalogues.show', compact('Catalogue'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Catalogue = $this->Catalogue->find($id);

		if (is_null($Catalogue))
		{
			return Redirect::route('catalogues.index');
		}

		return View::make('catalogues.edit', compact('Catalogue'));
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
		$validation = Validator::make($input, Catalogue::$rules);

		if ($validation->passes())
		{
			$Catalogue = $this->Catalogue->find($id);
			$Catalogue->update($input);

			return Redirect::route('catalogues.show', $id);
		}

		return Redirect::route('catalogues.edit', $id)
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
		$this->Catalogue->find($id)->delete();

		return Redirect::route('catalogues.index');
	}

}
