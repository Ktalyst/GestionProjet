<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'accueil', function()
{
	return View::make('accueil');
}));

Route::resource('clients', 'ClientsController');

Route::resource('contacts', 'ContactsController');

//Route::resource('clients.contacts', 'ContactsController');

Route::resource('contrats', 'ContratsController');

Route::resource('commandes', 'CommandesController');

Route::resource('items', 'ItemsController');

Route::resource('servicerequests', 'ServicerequestsController');

Route::get('/contacts/{id}/delete', array('as' => 'deletecontacts', function($id)
{
	return App::make('ContactsController')->destroy($id);
}));