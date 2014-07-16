<?php

class ServicerequestcomplexitiesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('service_request_complexities')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'low',
					'code' => 'l',
					'catalogue_id' => 1,
				),

				array(
					'id' => 2,
					'nom' => 'medium',
					'code' => 'm',
					'catalogue_id' => 1,
				),

				array(
					'id' => 3,
					'nom' => 'high',
					'code' => 'h',
					'catalogue_id' => 2,
				),
			)
		);
	}

}
