<?php

class ClientsContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($listId)
	{
		echo Route::currentRouteName().'<br>';
        echo "index:: clients : $listId, tous contacts ";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($listId)
	{
		echo Route::currentRouteName().'<br>';
        echo "create:: clients : $listId, contacts ";
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($listId,$id)
	{
		echo Route::currentRouteName().'<br>';
        echo "show:: clients : $listId, contacts id: $id";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($listId,$id)
	{
		echo Route::currentRouteName().'<br>';
        echo "edit:: clients : $listId, contacts id: $id";
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
