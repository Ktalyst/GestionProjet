<?php

class ClientsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('clients')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'Airbus',
				),

				array(
					'id' => 2,
					'nom' => 'EDF',
				),

				array(
					'id' => 3,
					'nom' => 'Sopra',
				)
			)
		);
	}

}


