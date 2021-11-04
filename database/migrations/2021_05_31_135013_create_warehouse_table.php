<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarehouseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warehouse', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('address', 65535);
			$table->text('company_name', 65535);
			$table->string('lat');
			$table->string('lng');
			$table->string('pool_id', 11);
			$table->string('email');
			$table->text('notification', 65535);
			$table->string('username');
			$table->string('password');
			$table->string('title');
			$table->timestamps();
			$table->string('contact_name');
			$table->string('delivery_service');
			$table->string('delivery_location');
			$table->string('delivery_window');
			$table->string('pikup');
			$table->text('description', 65535);
			$table->string('geo_boundary');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('warehouse');
	}

}
