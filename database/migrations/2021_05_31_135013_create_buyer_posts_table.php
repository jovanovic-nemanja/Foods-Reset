<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyerPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buyer_posts', function(Blueprint $table)
		{
			$table->integer('buyer_post_id', true);
			$table->integer('product_id');
			$table->integer('user_id');
			$table->date('expiry');
			$table->integer('quantity');
			$table->string('status', 40)->default('pending');
			$table->integer('rating');
			$table->string('duration', 40);
			$table->float('price', 10, 0);
			$table->timestamps();
			$table->integer('category_id');
			$table->string('remaning_days', 40);
			$table->text('search_keywords', 65535);
			$table->integer('is_email')->default(0);
			$table->integer('from_supplier_id');
			$table->string('expiry2');
			$table->dateTime('delivery_window');
			$table->float('buyer_bid', 10, 0);
			$table->string('buyer_bid_quantity', 100);
			$table->string('buyer_bid_comment', 600);
			$table->integer('supplier_post_id');
			$table->string('sku');
			$table->boolean('is_low_bid')->default(0);
			$table->dateTime('delivery_window_to');
			$table->string('payment_status')->default('pending');
			$table->boolean('is_disable')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buyer_posts');
	}

}
