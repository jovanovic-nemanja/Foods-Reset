<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierPostsTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_posts_temp', function(Blueprint $table)
		{
			$table->integer('supplier_post_id', true);
			$table->boolean('flag')->default(0);
			$table->float('price', 10, 0);
			$table->string('status', 40)->default('pending');
			$table->integer('quantity');
			$table->string('order_duration', 40);
			$table->integer('user_id');
			$table->text('description', 65535);
			$table->integer('unit_per_case')->default(0);
			$table->float('net_weight', 10, 0)->default(0);
			$table->float('list_price', 10, 0)->default(0);
			$table->float('per_case_price', 10, 0)->default(0);
			$table->text('item', 65535);
			$table->string('category', 400);
			$table->timestamps();
			$table->date('expiry');
			$table->string('pool');
			$table->string('sku');
			$table->string('product_location');
			$table->dateTime('delivery_window');
			$table->integer('is_allocation')->default(0);
			$table->text('file_name', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_posts_temp');
	}

}
