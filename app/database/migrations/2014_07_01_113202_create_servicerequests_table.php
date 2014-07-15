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
			$table->integer('servicerequesttype_id');
			$table->foreign('servicerequesttype_id')->references('id')->on('servicerequesttype')->onDelete('restrict')->onUpdate('cascade');
			$table->integer('servicerequestcomplexity_id');
			$table->foreign('servicerequestcomplexity_id')->references('id')->on('servicerequestcomplexity')->onDelete('restrict')->onUpdate('cascade');
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
