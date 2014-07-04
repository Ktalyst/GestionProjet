<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->insert(
 
            array(
                array(
                    'id' => 1,
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'email' => 'admin@plop.fr',
                    'role_id' => 3,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 2,
                    'username' => 'Dupont',
                    'password' => Hash::make('dupont'),
                    'email' => 'dupont@plop.fr',
                    'role_id' => 2,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
 
                array(
                    'id' => 3,
                    'username' => 'Durand',
                    'password' => Hash::make('durand'),
                    'email' => 'durand@plop.fr',
                    'role_id' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                )
            )
        );
    }
}