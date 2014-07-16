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
			$table->integer('serviceRequestComplexity_id')->unsigned();
			$table->integer('service_id')->unsigned();
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
