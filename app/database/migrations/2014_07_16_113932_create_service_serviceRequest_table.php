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
			$table->integer('servicerequest_id')->unsigned();
			$table->integer('nombreUO');
		});	
	}

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
