<?php 

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

abstract class BaseResourceController extends \Illuminate\Routing\Controller {

	protected $gestion;
	protected $base;
	protected $message_store;
	protected $message_update;

	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
		$this->beforeFilter('ajax', array('on' => array('delete', 'put')));
	}

	public function index()
	{
		$lignes = $this->gestion->listePages(10);
		return View::make('clients.liste', compact('lignes'));
	}

	public function create()
	{
		return View::make('clients.create',  $this->gestion->create());
	}

	public function store()
	{
    $return = $this->gestion->store();
    if($return === true) {
    	return Redirect::route('clients.index')->with('message_success', $this->message_store);
    } 
		return Redirect::route('clients.create')->withInput()->withErrors($return);
	}

	public function show($id)
	{
		return View::make('clients.show', $this->gestion->show($id));
	}

	public function edit($id)
	{
		return View::make('clients.edit', $this->gestion->edit($id));
	}

	public function update($id)
	{
		$return = $this->gestion->update($id);
		if($return === true) {
			return Redirect::route('clients.index')->with('message_success', $this->message_update);
		}
		return Redirect::route('clients.edit', $id)->withInput()->withErrors($return);
	}

	public function destroy($id)
	{
		$this->gestion->destroy($id);
		return Redirect::back();
	}

}