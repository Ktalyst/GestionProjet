<?php

class CataloguesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('catalogues')->insert(
			array(
				array(
					'id' => 1,
					'nom' => 'Catalogue 1',
					'code' => '4f5d694',
				),

				array(
					'id' => 2,
					'nom' => 'Catalogue 2',
					'code' => '4f5d694',
				),

				array(
					'id' => 3,
					'nom' => 'Catalogue 3',
					'code' => '4f5d694',
				),
			)
		);
	}

}
