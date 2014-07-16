<?php

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contacts')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'Dupond',
					'prenom' => 'Jean',
					'adresse' => '115 route des cannes',
					'client_id' => '1',
				),

				array(
					'id' => 2,
					'nom' => 'Dupont',
					'prenom' => 'Pierre',
					'adresse' => '12 avenue des tulipes',
					'client_id' => '1',
				),

				array(
					'id' => 3,
					'nom' => 'Tintin',
					'prenom' => 'Pinpin',
					'adresse' => '5 rue des pins',
					'client_id' => '2',
				)
			)
		);
	}

}
