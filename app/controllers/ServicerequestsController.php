<?php

class ServicerequestsController extends BaseController {

	/**
	 * Servicerequest Repository
	 *
	 * @var Servicerequest
	 */
	protected $servicerequest;

	public function __construct(Servicerequest $servicerequest, Catalogue $catalogue, Item $item)
	{
		$this->servicerequest = $servicerequest;
		$this->catalogue = $catalogue;
		$this->item = $item;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$servicerequests = $this->servicerequest->all();

		return View::make('servicerequests.index', compact('servicerequests'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('servicerequests.create', 
			array('selectitem' => $this->item->all()->lists('code', 'id'), 
				'selectcatalogue' => $this->catalogue->all()->lists('nom', 'id')));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$item = Input::get('item_id');
		$srtype = Input::get('servicerequesttype_id');
		$src = Input::get('servicerequestcomplexity_id') ;
		$nom = Input::get('nom');
		$input = array('nom' => $nom, 'item_id' => $item, 'servicerequesttype_id' => $srtype, 'servicerequestcomplexity_id' => $src);
		$validation = Validator::make($input, Servicerequest::$rules);

		if ($validation->passes())
		{
			$sr = $this->servicerequest->create($input);
			DB::transaction(function() use($sr)
			{
				$services = array_unique(Input::get('service'));
				$uo = Input::get('uo');
				foreach($services as $key => $s)
				{
					foreach($uo as $keyuo => $u){
						if($keyuo == $key){
							$sr->pivot->nombreUO = $u;
							$sr->services()->attach($key);
						}
					}
				}
			}); 


		}

		return Redirect::route('servicerequests.create')
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
		$servicerequest = $this->servicerequest->findOrFail($id);

		return View::make('servicerequests.show', compact('servicerequest'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$servicerequest = $this->servicerequest->find($id);

		if (is_null($servicerequest))
		{
			return Redirect::route('servicerequests.index');
		}

		return View::make('servicerequests.edit', compact('servicerequest'));
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
		$validation = Validator::make($input, Servicerequest::$rules);

		if ($validation->passes())
		{
			$servicerequest = $this->servicerequest->find($id);
			$servicerequest->update($input);

			return Redirect::route('servicerequests.show', $id);
		}

		return Redirect::route('servicerequests.edit', $id)
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
		$this->servicerequest->find($id)->delete();

		return Redirect::route('servicerequests.index');
	}

}
