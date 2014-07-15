<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceRequestComplexitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_request_complexities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('code');
			$table->integer('catalogue_id')->unsigned();
			$table->foreign('catalogue_id')->references('id')->on('catalogue')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::drop('serviceRequestComplexities');
	}

}
