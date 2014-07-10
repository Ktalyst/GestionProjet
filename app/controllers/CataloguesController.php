<?php

class CataloguesController extends BaseController {

	/**
	 * Catalogue Repository
	 *
	 * @var Catalogue
	 */
	protected $Catalogue;

	public function __construct(Catalogue $Catalogue, ServiceRequestType $serviceRequestType, ServiceRequestComplexity $serviceRequestComplexity, Service $service)
	{
		$this->Catalogue = $Catalogue;
		$this->ServiceRequestType = $serviceRequestType;
		$this->Service = $service;
		$this->ServiceRequestComplexity = $serviceRequestComplexity;
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
		$servicerequestcomplexities = $this->ServiceRequestComplexity->all();
		$servicerequesttypes = $this->ServiceRequestType->all();
		return View::make('catalogues.create', compact('servicerequestcomplexities','servicerequesttypes'));
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

		$servicenom= Input::get('servicenom');
		$servicecode = Input::get('servicecode');
		for($i = 1; $i <= count($servicenom); $i++)
		{
			$inputservice = array('nom' => $servicenom[$i], 'code' => $servicecode[$i], 'catalogue_id' => $catalogue->id);
			$this->Service->create($inputservice);
		}

		$nomsrt = Input::get('srt');
		foreach($nomsrt as $key => $nom)
		{
			$srt = $this->ServiceRequestType->findByNameOrFail($nom);
			$srt->catalogue_id = $catalogue->id;
			$srt->save();
		}

		$nomsrc = Input::get('src');
		foreach($nomsrc as $key => $nom)
		{
			$src = $this->ServiceRequestComplexity->findByNameOrFail($nom);
			$src->catalogue_id = $catalogue->id;
			$src->save();
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
		$old = Input::old();
		$Catalogue = $this->Catalogue->find($id);
		if (is_null($Catalogue))
		{
			return Redirect::route('catalogues.index');
		}
		$retour = array(
			'catalogue' => $Catalogue,
			'select_services' => $this->Service->all()->lists('nom', 'id'),
			'select_complexites' => $this->ServiceRequestComplexity->all()->lists('nom', 'id'), 
			'select_types' => $this->ServiceRequestType->all()->lists('nom', 'id'));
		$retour['services'] = empty($old)?$Catalogue->services->toArray(): $old['services'];
		$retour['srt'] = $Catalogue->serviceRequestTypes()->lists('nom', 'id');
		$retour['src'] = $Catalogue->serviceRequestComplexities()->lists('nom', 'id');
		return View::make('catalogues.edit', $retour);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$catalogue = $this->Catalogue->find($id);
		$nom = Input::get('nom');
		$code = Input::get('code');
		$input = array('nom' => $nom, 'code' => $code);
		$catalogue->update($input);

		$servicenom= Input::get('servicenom');
		$servicecode = Input::get('servicecode');
		for($i = 0; $i < count($servicenom); $i++)
		{
			$inputservice = array('nom' => $servicenom[$i], 'code' => $servicecode[$i], 'catalogue_id' => $catalogue->id);
			$this->Service->create($inputservice);
		}

		$nomsrt = Input::get('srt');
		foreach($nomsrt as $key => $nom)
		{
			$srt = $this->ServiceRequestType->findByNameOrFail($nom);
			$srt->catalogue_id = $catalogue->id;
			$srt->save();
		}

		$nomsrc = Input::get('src');
		foreach($nomsrc as $key => $nom)
		{
			$src = $this->ServiceRequestComplexity->findByNameOrFail($nom);
			$src->catalogue_id = $catalogue->id;
			$src->save();
		}
			return Redirect::route('catalogues.index');
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
