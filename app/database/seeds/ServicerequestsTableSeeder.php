<?php

class ServicerequestsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('servicerequests')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'SR A',
					'item_id' => 'l',
					'servicerequesttype_id' => 1,
					'servicerequestcomplexity_id' => 1,
				),

				array(
					'id' => 2,
					'nom' => 'SR B',
					'item_id' => 'l',
					'servicerequesttype_id' => 1,
					'servicerequestcomplexity_id' => 2,
				),

				array(
					'id' => 3,
					'nom' => 'SR C',
					'item_id' => 'l',
					'servicerequesttype_id' => 2,
					'servicerequestcomplexity_id' => 1,
				),
			)
		);
	}

}
