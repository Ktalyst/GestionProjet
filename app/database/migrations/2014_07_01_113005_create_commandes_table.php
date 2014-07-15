<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commandes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code');
			$table->integer('contrat_id')->unsigned();
			$table->foreign('contrat_id')->references('id')->on('contrat')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::drop('commandes');
	}

}
