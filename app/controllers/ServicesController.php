<?php

class ServicesController extends BaseController {

	/**
	 * Service Repository
	 *
	 * @var Service
	 */
	protected $service;

	public function __construct(Service $service, Unit $unit)
	{
		$this->service = $service;
		$this->unit = $unit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = $this->service->all();

		return View::make('services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('services.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function unitCreate($id)
	{
		$service = $this->service->findOrFail($id);
		return View::make('services.unitcreate', compact('service'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Service::$rules);

		if ($validation->passes())
		{
			$this->service->create($input);

			return Redirect::route('services.index');
		}

		return Redirect::route('services.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function unitStore()
	{
		$workload = Input::get('input');
		foreach($workload as $unit)
		{
			$this->unit->create($unit);
		}
		$service_id = $workload["1"]["service_id"];
		return Redirect::route('services.show', array("id" => $service_id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = $this->service->findOrFail($id);

		return View::make('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = $this->service->find($id);

		if (is_null($service))
		{
			return Redirect::route('services.index');
		}

		return View::make('services.edit', compact('service'));
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
		$validation = Validator::make($input, Service::$rules);

		if ($validation->passes())
		{
			$service = $this->service->find($id);
			$service->update($input);

			return Redirect::route('services.show', $id);
		}

		return Redirect::route('services.edit', $id)
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
		$service = $this->service->find($id);
		$service->delete();
		return Redirect::to(URL::previous())->withInput();
	}

}
