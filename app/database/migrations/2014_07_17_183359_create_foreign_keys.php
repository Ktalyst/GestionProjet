<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('contacts', function(Blueprint $table){
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
		});
		Schema::table('contrats', function(Blueprint $table) {
       		$table->foreign('contact_id')->references('id')->on('contacts')->onDelete('restrict')->onUpdate('cascade');
   		});
  		Schema::table('commandes', function(Blueprint $table) {
       		$table->foreign('contrat_id')->references('id')->on('contrats')->onDelete('restrict')->onUpdate('cascade');
   		});
		Schema::table('items', function(Blueprint $table) {
       		$table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade')->onUpdate('cascade');
   		});
		Schema::table('service_request_types', function(Blueprint $table) {
       		$table->foreign('catalogue_id')->references('id')->on('catalogues')->onDelete('restrict')->onUpdate('cascade');
   		});
		Schema::table('services', function(Blueprint $table) {
       		$table->foreign('catalogue_id')->references('id')->on('catalogues')->onDelete('cascade')->onUpdate('cascade');
   		});
 		Schema::table('service_request_complexities', function(Blueprint $table) {
       		$table->foreign('catalogue_id')->references('id')->on('catalogues')->onDelete('restrict')->onUpdate('cascade');
   		});
		Schema::table('servicerequests', function(Blueprint $table) {
       		$table->foreign('servicerequesttype_id')->references('id')->on('service_request_types');
       		$table->foreign('servicerequestcomplexity_id')->references('id')->on('service_request_complexities');
   		});
		Schema::table('Taches', function(Blueprint $table) {
       		$table->foreign('service_id')->references('id')->on('services')->onDelete('restrict')->onUpdate('cascade');
   		});
		Schema::table('Units', function(Blueprint $table) {
       		$table->foreign('serviceRequestType_id')->references('id')->on('service_request_types')->onDelete('cascade')->onUpdate('cascade');
       		$table->foreign('serviceRequestComplexity_id')->references('id')->on('service_request_complexities')->onDelete('cascade')->onUpdate('cascade');
       		$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
   		});
		Schema::table('service_serviceRequest', function(Blueprint $table) {
       		$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
       		$table->foreign('servicerequest_id')->references('id')->on('servicerequests')->onDelete('cascade')->onUpdate('cascade');
   		});
	}

	public function down()
	{
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
		Schema::table('contrats', function(Blueprint $table) {
			$table->dropForeign('contrats_contact_id_foreign');
		});
		Schema::table('commandes', function(Blueprint $table) {
			$table->dropForeign('commandes_contrat_id_foreign');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->dropForeign('items_commande_id_foreign');
		});
		Schema::table('service_request_types', function(Blueprint $table) {
			$table->dropForeign('service_request_types_catalogue_id_foreign');
		});
		Schema::table('services', function(Blueprint $table) {
			$table->dropForeign('services_catalogue_id_foreign');
		});
		Schema::table('service_request_complexities', function(Blueprint $table) {
			$table->dropForeign('service_request_complexities_catalogue_id_foreign');
		});
		Schema::table('servicerequests', function(Blueprint $table) {
			$table->dropForeign('servicerequests_servicerequesttype_id_foreign');
			$table->dropForeign('servicerequests_servicerequestcomplexity_id_foreign');
		});
		Schema::table('Taches', function(Blueprint $table) {
			$table->dropForeign('Taches_service_id_foreign');
		});
		Schema::table('Units', function(Blueprint $table) {
			$table->dropForeign('Units_serviceRequestType_id_foreign');
			$table->dropForeign('Units_serviceRequestComplexity_id_foreign');
			$table->dropForeign('Units_service_id_foreign');
		});
		Schema::table('service_serviceRequest', function(Blueprint $table) {
			$table->dropForeign('service_serviceRequest_service_id_foreign');
			$table->dropForeign('service_servicerequest_servicerequest_id_foreign');
		});
	}
}