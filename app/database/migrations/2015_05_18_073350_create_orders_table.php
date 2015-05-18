<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->double('total');
			$table->double('cash');
			$table->integer('customer_id');
			$table->string('del_to');
			$table->string('del_contact_number');
			$table->string('del_address_number');
			$table->string('del_address_baranggay');
			$table->string('del_address_municipal');
			$table->string('del_address_province');
			$table->string('del_message');
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
		Schema::drop('orders');
	}

}
