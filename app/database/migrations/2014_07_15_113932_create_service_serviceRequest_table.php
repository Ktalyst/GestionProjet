<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceServiceRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_serviceRequest', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('service_id')->unsigned();
			$table->foreign('service_id')->references('id')->on('service')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('servicerequest_id')->unsigned();
			$table->foreign('servicerequest_id')->references('id')->on('servicerequest')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('nombreUO');
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_serviceRequest');
	}

}
