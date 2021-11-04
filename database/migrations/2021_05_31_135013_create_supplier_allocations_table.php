<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierAllocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_allocations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('supplier_id');
			$table->integer('buyer_id');
			$table->integer('buyer_post_id');
			$table->string('is_other_post', 2)->default('0');
			$table->integer('buyer_other_post_id');
			$table->float('allocation', 10, 0);
			$table->float('requried_quantity', 10, 0);
			$table->float('reallocation', 10, 0);
			$table->integer('category_id');
			$table->string('product_id', 11);
			$table->string('product_name');
			$table->integer('supplier_post_id');
			$table->integer('supplier_other_post_id');
			$table->timestamps();
			$table->string('status');
			$table->integer('is_email_sent')->default(0);
			$table->integer('is_allocation_email')->default(0);
			$table->integer('parent_id')->default(0);
			$table->integer('rating');
			$table->text('comments', 65535);
			$table->string('sku');
			$table->float('buyer_bid', 10, 0);
			$table->string('payment_status')->default('pending');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_allocations');
	}

}
