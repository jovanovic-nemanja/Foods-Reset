<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('notification_title');
			$table->integer('allocation_id');
			$table->text('notification_content', 65535);
			$table->integer('buyer_id');
			$table->integer('supplier_id');
			$table->string('status', 40)->default('unread');
			$table->timestamps();
			$table->integer('user_id');
			$table->integer('associate_id');
			$table->string('type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}
