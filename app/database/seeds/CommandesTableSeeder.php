<?php

class CommandesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('commandes')->insert(
			array(
				array(
					'id' => 1,
					'code' => 'Com58d8',
					'contrat_id' => '1',
				),

				array(
					'id' => 2,
					'code' => 'Comf58',
					'contrat_id' => '1',
				),

				array(
					'id' => 3,
					'code' => 'Coms569',
					'contrat_id' => '1',
				),
			)
		);
	}

}
