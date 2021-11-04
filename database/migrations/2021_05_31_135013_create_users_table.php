<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 40);
			$table->string('email');
			$table->timestamps();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->string('text_notification', 2)->default('0');
			$table->string('email_notification', 2)->default('0');
			$table->text('address', 65535);
			$table->string('company_name');
			$table->integer('user_role')->default(1);
			$table->string('delivery_service');
			$table->string('delivery_location');
			$table->dateTime('delivery_window');
			$table->string('pikup');
			$table->string('description');
			$table->string('noti_email');
			$table->string('mobile');
			$table->string('geo_boundary');
			$table->string('pool', 40)->nullable();
			$table->string('bank');
			$table->string('branch');
			$table->string('transit');
			$table->string('account_number');
			$table->text('details', 65535);
			$table->string('lat');
			$table->string('lng');
			$table->text('city', 65535);
			$table->text('state', 65535);
			$table->text('zipcode', 65535);
			$table->text('country', 65535);
			$table->text('street', 65535);
			$table->string('preference')->nullable();
			$table->dateTime('delivery_window_to');
			$table->string('user_status', 55)->default('active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
