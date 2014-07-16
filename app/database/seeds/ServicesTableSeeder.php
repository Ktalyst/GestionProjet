<?php

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('services')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'Service 1',
					'code' => '4f5d694',
					'catalogue_id' => 1,
				),

				array(
					'id' => 2,
					'nom' => 'Service 1',
					'code' => '4f5d694',
					'catalogue_id' => 1,
				),

				array(
					'id' => 3,
					'nom' => 'Service 1',
					'code' => '4f5d694',
					'catalogue_id' => 2,
				),
			)
		);
	}
}
