<?php
class ApiController extends BaseController
{
       public function __construct()
    {
    }

    public function getIndex()
    {
        $input = Input::get('option');
        $client = Client::find($input);
        $contacts = $client->contacts->lists('nom', 'id');
        return $contacts;
    }

    public function getIndexCatalogue()
    {
        $input = Input::get('option');
        $catalogue = Catalogue::find($input);
        $types = $catalogue->serviceRequestTypes->lists('nom', 'id');
        $complexities = $catalogue->serviceRequestComplexities->lists('nom', 'id');
        $services = $catalogue->services->lists('nom', 'id');
        return array('types' => $types, 'complexities' => $complexities, 'services' => $services);
    }

    public function getIndexCommande()
    {
        $input = Input::get('option');
        $client = Client::find($input);
        $contrats = $client->contrats->lists('nom', 'id');
        return $contrats;
    }
}