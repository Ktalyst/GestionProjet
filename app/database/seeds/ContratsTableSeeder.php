<?php

class ContratsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contrats')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'Contrat C589',
					'code' => 'C879A',
					'contact_id' => '1',
				),

				array(
					'id' => 2,
					'nom' => 'Contrat 698D45',
					'code' => '698D45',
					'contact_id' => '1',
				),

				array(
					'id' => 3,
					'nom' => 'Contrat C5933d223',
					'code' => 'C5933d223',
					'contact_id' => '2',
				)
			)
		);
	}

}
