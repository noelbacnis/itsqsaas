<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('clients', function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('tagline');
			$table->string('image');
			$table->string('primary_color');
			$table->string('contact_number');
			$table->string('address');
			$table->string('status');
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
		//
		Schema::dropIfExists('clients');
	}

}
