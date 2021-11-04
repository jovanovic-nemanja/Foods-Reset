<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_posts', function(Blueprint $table)
		{
			$table->integer('supplier_post_id', true);
			$table->float('price', 10, 0);
			$table->string('status', 40)->default('pending');
			$table->integer('quantity');
			$table->string('order_duration', 40);
			$table->integer('rating');
			$table->integer('destribution_restrictions');
			$table->integer('images');
			$table->integer('user_id');
			$table->text('description', 65535);
			$table->integer('unit_per_case')->default(0);
			$table->float('net_weight', 10, 0)->default(0);
			$table->float('list_price', 10, 0)->default(0);
			$table->float('per_case_price', 10, 0)->default(0);
			$table->text('item', 65535);
			$table->string('category', 400);
			$table->string('supplier_type', 40);
			$table->timestamps();
			$table->integer('product_id');
			$table->text('search_keywords', 65535);
			$table->date('expiry');
			$table->string('expiry2');
			$table->text('des_keywords', 65535);
			$table->string('pool');
			$table->string('sku');
			$table->string('product_location');
			$table->dateTime('delivery_window');
			$table->integer('is_allocation')->default(0);
			$table->string('delivery_service');
			$table->string('delivery_location');
			$table->text('description2', 65535);
			$table->string('geo_boundary');
			$table->text('file_name', 65535);
			$table->dateTime('delivery_window_to');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_posts');
	}

}
