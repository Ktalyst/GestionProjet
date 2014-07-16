<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicerequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicerequests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->integer('item_id');
			$table->integer('servicerequesttype_id')->unsigned();
			$table->integer('servicerequestcomplexity_id')->unsigned();
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
		Schema::drop('servicerequests');
	}

}
