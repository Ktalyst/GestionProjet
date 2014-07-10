<?php

class ServiceRequestComplexitiesController extends BaseController {

	/**
	 * ServiceRequestComplexity Repository
	 *
	 * @var ServiceRequestComplexity
	 */
	protected $serviceRequestComplexity;

	public function __construct(ServiceRequestComplexity $serviceRequestComplexity, Catalogue $catalogue)
	{
		$this->serviceRequestComplexity = $serviceRequestComplexity;
		$this->catalogue = $catalogue;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$serviceRequestComplexities = $this->serviceRequestComplexity->all();

		return View::make('servicerequestcomplexities.index', compact('serviceRequestComplexities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$catalogues = $this->catalogue->all();
		return View::make('servicerequestcomplexities.create', compact('catalogues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ServiceRequestComplexity::$rules);

		if ($validation->passes())
		{
			$this->serviceRequestComplexity->create($input);

			return Redirect::route('servicerequestcomplexities.index');
		}

		return Redirect::route('servicerequestcomplexities.create')
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
		$serviceRequestComplexity = $this->serviceRequestComplexity->findOrFail($id);

		return View::make('servicerequestcomplexities.show', compact('serviceRequestComplexity'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$serviceRequestComplexity = $this->serviceRequestComplexity->find($id);

		if (is_null($serviceRequestComplexity))
		{
			return Redirect::route('servicerequestcomplexities.index');
		}

		return View::make('servicerequestcomplexities.edit', compact('serviceRequestComplexity'));
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
		$validation = Validator::make($input, ServiceRequestComplexity::$rules);

		if ($validation->passes())
		{
			$serviceRequestComplexity = $this->serviceRequestComplexity->find($id);
			$serviceRequestComplexity->update($input);

			return Redirect::route('servicerequestcomplexities.show', $id);
		}

		return Redirect::route('servicerequestcomplexities.edit', $id)
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
		$this->serviceRequestComplexity->find($id)->delete();

		return Redirect::route('servicerequestcomplexities.index');
	}

}
