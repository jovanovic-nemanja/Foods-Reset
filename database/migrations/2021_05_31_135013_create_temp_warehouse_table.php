<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempWarehouseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_warehouse', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('keyid');
			$table->integer('wid');
			$table->integer('user_id');
			$table->text('token', 65535);
			$table->string('geo_boundary');
			$table->text('description', 65535);
			$table->string('delivery_window');
			$table->string('delivery_location');
			$table->string('delivery_service');
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
		Schema::drop('temp_warehouse');
	}

}
