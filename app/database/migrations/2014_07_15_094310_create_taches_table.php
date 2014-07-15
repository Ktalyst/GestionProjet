<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTachesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Taches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->decimal('pourcentage');
			$table->integer('service_id')->unsigned();
			$table->foreign('service_id')->references('id')->on('service')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::drop('Taches');
	}

}
