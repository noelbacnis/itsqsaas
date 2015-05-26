<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('subscriptions', function($table){
			$table->increments('id');
			$table->integer('client_id');
			$table->integer('subscriptions_types_id');
			$table->string('account_number');
			$table->integer('total_amount');
			$table->datetime('start_period');
			$table->datetime('end_period');
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
	}

}
