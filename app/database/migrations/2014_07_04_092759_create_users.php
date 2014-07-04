<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::create('users', function($table) {
			$table->increments('id')->unsigned();
			$table->string('username', 64)->unique();
			$table->string('password', 64);
			$table->string('email', 64)->unique();
			$table->enum('statut', array('user', 'admin', 'resource', 'manager'))->default('user');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
