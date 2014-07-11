<?php

class UnitsController extends BaseController {

	/**
	 * Unit Repository
	 *
	 * @var Unit
	 */
	protected $Unit;

	public function __construct(Unit $Unit)
	{
		$this->Unit = $Unit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Units = $this->Unit->all();

		return View::make('Units.index', compact('Units'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Units.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Unit::$rules);

		if ($validation->passes())
		{
			$this->Unit->create($input);

			return Redirect::route('Units.index');
		}

		return Redirect::route('Units.create')
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
		$Unit = $this->Unit->findOrFail($id);

		return View::make('Units.show', compact('Unit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Unit = $this->Unit->find($id);

		if (is_null($Unit))
		{
			return Redirect::route('Units.index');
		}

		return View::make('Units.edit', compact('Unit'));
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
		$validation = Validator::make($input, Unit::$rules);

		if ($validation->passes())
		{
			$Unit = $this->Unit->find($id);
			$Unit->update($input);

			return Redirect::route('Units.show', $id);
		}

		return Redirect::route('Units.edit', $id)
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
		$this->Unit->find($id)->delete();

		return Redirect::route('Units.index');
	}

}
