<?php

class ServicerequesttypesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('service_request_types')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'PR',
					'code' => 'pr',
					'catalogue_id' => 1,
				),

				array(
					'id' => 2,
					'nom' => 'CR',
					'code' => 'cr',
					'catalogue_id' => 1,
				),

				array(
					'id' => 3,
					'nom' => 'NR',
					'code' => 'nr',
					'catalogue_id' => 2,
				),
			)
		);
	}

}
