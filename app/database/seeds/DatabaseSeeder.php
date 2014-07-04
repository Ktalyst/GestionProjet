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
		$this->call('ServicerequestsTableSeeder');
		$this->call('UserTableSeeder');
	}
}