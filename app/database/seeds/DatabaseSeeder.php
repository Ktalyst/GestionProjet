<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		$this->call('ClientsTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('ContratsTableSeeder');
		$this->call('CommandesTableSeeder');
		$this->call('ItemsTableSeeder');
		$this->call('CataloguesTableSeeder');
		$this->call('ServicerequesttypesTableSeeder');
		$this->call('ServicerequestcomplexitiesTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('ServicerequestsTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('UnitsTableSeeder');
		$this->call('TachesTableSeeder');
	}
}