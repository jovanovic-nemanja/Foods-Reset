<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sku', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('sku');
			$table->timestamps();
			$table->string('is_use', 2)->default('0');
			$table->integer('created_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sku');
	}

}
