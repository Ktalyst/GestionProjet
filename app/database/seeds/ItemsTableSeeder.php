<?php

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('items')->insert(
			array(
				array(
					'id' => 1,
					'code' => '4f5d694',
					'dateRecu' => '',
					'montant' => '4879',
					'description' => 'Item de la première commande',
					'commande_id' => '1',
				),

				array(
					'id' => 2,
					'code' => 'd8e74f',
					'dateRecu' => '',
					'montant' => '52369',
					'description' => 'Item de la première commande',
					'commande_id' => '1',
				),

				array(
					'id' => 3,
					'code' => 'e4d85',
					'dateRecu' => '',
					'montant' => '45871',
					'description' => 'Item de la première commande',
					'commande_id' => '1',
				),
			)
		);
	}

}
