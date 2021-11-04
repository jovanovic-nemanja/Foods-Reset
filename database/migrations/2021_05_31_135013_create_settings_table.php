<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('setting_name', 65535);
			$table->text('setting_description', 65535);
			$table->timestamps();
			$table->text('price', 65535);
			$table->text('remainingdays', 65535);
			$table->text('quantity', 65535);
			$table->text('duration', 65535);
			$table->text('pool', 65535);
			$table->text('bank_detail', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
