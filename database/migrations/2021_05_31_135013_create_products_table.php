<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('product_name');
			$table->text('product_description', 65535);
			$table->timestamps();
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->integer('category_id');
			$table->text('product_tags', 65535);
			$table->string('type', 11)->default('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
