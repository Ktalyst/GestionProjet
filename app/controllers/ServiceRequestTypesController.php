<?php

class ServiceRequestTypesController extends BaseController {

	/**
	 * ServiceRequestType Repository
	 *
	 * @var ServiceRequestType
	 */
	protected $serviceRequestType;

	public function __construct(ServiceRequestType $serviceRequestType, Catalogue $catalogue)
	{
		$this->serviceRequestType = $serviceRequestType;
		$this->catalogue = $catalogue;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$serviceRequestTypes = $this->serviceRequestType->all();

		return View::make('servicerequesttypes.index', compact('serviceRequestTypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$catalogues = $this->catalogue->all();
		return View::make('servicerequesttypes.create', compact('catalogues'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, ServiceRequestType::$rules);

		if ($validation->passes())
		{
			$this->serviceRequestType->create($input);

			return Redirect::route('servicerequesttypes.index');
		}

		return Redirect::route('servicerequesttypes.create')
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
		$serviceRequestType = $this->serviceRequestType->findOrFail($id);
		return View::make('servicerequesttypes.show', compact('serviceRequestType'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$serviceRequestType = $this->serviceRequestType->find($id);

		if (is_null($serviceRequestType))
		{
			return Redirect::route('servicerequesttypes.index');
		}

		return View::make('servicerequesttypes.edit', compact('serviceRequestType'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param string $code
	 * @return Response
	 */
	public function update($id, $code)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, ServiceRequestType::$rules);

		if ($validation->passes())
		{
			$serviceRequestType = $this->serviceRequestType->find($id);
			$serviceRequestType->update($input);

			return Redirect::route('servicerequesttypes.show', $id);
		}

		return Redirect::route('servicerequesttypes.edit', $id)
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
		$this->serviceRequestType->find($id)->delete();

		return Redirect::route('servicerequesttypes.index');

	}

}
