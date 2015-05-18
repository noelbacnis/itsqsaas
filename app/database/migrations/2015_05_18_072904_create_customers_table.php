<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('last_name');
			$table->string('first_name');
			$table->string('email');
			$table->string('password');
			$table->string('gender');
			$table->string('status');
			$table->string('del_contact_number');
			$table->string('del_address_number');
			$table->string('del_address_baranggay');
			$table->string('del_address_municipal');
			$table->string('del_address_province');
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
		Schema::drop('customers');
	}

}
