<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pools', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('pool_name');
			$table->timestamps();
			$table->string('distance')->default('0');
			$table->integer('pool_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pools');
	}

}
