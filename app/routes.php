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

Route::get('/', array('uses' => 'HomeController@accueil', 'before' => 'auth', 'as' => 'accueil'));

Route::controller('auth', 'AuthController');

Route::controller('remind', 'RemindersController');

Route::group(array('before' => 'admin'), function()
{
	Route::resource('users', 'UserController');
	Route::get('admin', array('as' => 'admin', function(){return View::make('backend.accueil');}));
});

Route::group(array('before' => 'auth'), function()
{
	Route::resource('clients', 'ClientsController');
	Route::resource('contacts', 'ContactsController');
	Route::resource('contrats', 'ContratsController');
	Route::resource('commandes', 'CommandesController');
	Route::resource('items', 'ItemsController');
	Route::resource('servicerequests', 'ServicerequestsController');
	Route::resource('catalogues', 'CataloguesController');
	Route::resource('servicerequesttypes', 'ServicerequesttypesController');
	Route::resource('servicerequestcomplexities', 'ServicerequestcomplexitiesController');
	Route::get('api/dropdown','ApiController@getIndex');
	Route::resource('services', 'ServicesController');
	Route::get('commandes/imprimer/{id}', array('as' => 'print', 'uses' => 'CommandesController@imprimer'));
	Route::get('services/delete/{id}', array('as' => 'delete', 'uses' => 'ServicesController@destroy'));
});


App::missing(function($exception)
{
    return Response::make('error.404');
});





Route::resource('servicerequestcomplexities', 'ServicerequestcomplexitiesController');