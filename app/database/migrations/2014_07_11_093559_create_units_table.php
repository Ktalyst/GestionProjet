<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Units', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('nombre');
			$table->integer('serviceRequestType_id')->unsigned();
			$table->foreign('serviceRequestType_id')->references('id')->on('serviceRequestType')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('serviceRequestComplexity_id')->unsigned();
			$table->foreign('serviceRequestComplexity_id')->references('id')->on('serviceRequestComplexity')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('service_id')->unsigned();
			$table->foreign('service_id')->references('id')->on('service')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('Units');
	}

}
