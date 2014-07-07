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
}