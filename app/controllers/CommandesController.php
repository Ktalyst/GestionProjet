<?php

class CommandesController extends BaseController {

	/**
	 * Commande Repository
	 *
	 * @var Commande
	 */
	protected $commande;

	public function __construct(Commande $commande, Contrat $contrat, Client $client, Item $item)
	{
		$this->commande = $commande;
		$this->contrat = $contrat;
		$this->client = $client;
		$this->item = $item;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$commandes = $this->commande->all();

		return View::make('commandes.index', compact('commandes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('commandes.create', array('select' => $this->contrat->all()->lists('nom', 'id'), 	
				'selectclient' => $this->client->all()->lists('nom', 'id') ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$code = Input::get('code');
		$contrat = Input::get('contrat_id');
		$input = array('code' => $code, 'contrat_id' => $contrat);
		$validation = Validator::make($input, Commande::$rules);
		if ($validation->passes())
		{
			$commande = $this->commande->create($input);

			$itemcode= Input::get('itemcode');
			$itemdate = Input::get('itemdate');
			$itemmontant = Input::get('itemmontant');
			$itemdesc = Input::get('itemdesc');
			for($i = 1; $i <= count($itemcode); $i++)
			{
				$inputitem = array('code' => $itemcode[$i], 'dateRecu' => date("Y-m-d", strtotime($itemdate[$i])), 'montant' => $itemmontant[$i], 'description' => $itemdesc[$i], 'commande_id' => $commande->id);
				$validationitem = Validator::make($inputitem, Item::$rules);
				if ($validationitem->passes())
				{
					$this->item->create($inputitem);
				}

			}
			return Redirect::route('commandes.index');
		}
		return Redirect::route('clients.create')
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
		$commande = $this->commande->findOrFail($id);

		return View::make('commandes.show', compact('commande'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$commande = $this->commande->find($id);

		if (is_null($commande))
		{
			return Redirect::route('commandes.index');
		}

		return View::make('commandes.edit', compact('commande'), array('items' => $commande->items));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$commande = $this->commande->find($id);
		$code = Input::get('code');
		$commande->code = $code;
		$commande->save();

		$itemcode= Input::get('itemcode');
		$itemdate = Input::get('itemdate');
		$itemmontant = Input::get('itemmontant');
		$itemdesc = Input::get('itemdesc');
		for($i = 0; $i < count($itemcode); $i++)
		{
			if($this->item->findByCodeOrFail($itemcode[$i]) == false) {
				$inputitemc = array('code' => $itemcode[$i], 'dateRecu' => date("Y-m-d", strtotime($itemdate[$i])), 'montant' => $itemmontant[$i], 'description' => $itemdesc[$i], 'commande_id' => $commande->id);
				$this->item->create($inputitemc);
				return $inputitemc;
			} else {
				$item = $this->item->findByCodeOrFail($itemcode[$i]);
				$inputitem = array('dateRecu' => date("Y-m-d", strtotime($itemdate[$i])), 'montant' => $itemmontant[$i], 'description' => $itemdesc[$i]);
				$item->update($inputitem);
			}
		}
		return Redirect::route('commandes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->commande->find($id)->delete();

		return Redirect::route('commandes.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function imprimer($id)
	{
		$commande = $this->commande->find($id);

		return View::make('commandes.print', compact('commande'));
	}

}
