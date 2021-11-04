<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->text('bank_detail', 65535);
			$table->integer('supplier_post_id');
			$table->timestamps();
			$table->integer('buyer_post_id');
			$table->string('type', 40);
			$table->string('status', 40);
			$table->float('quantity', 10, 0);
			$table->integer('allocation_id');
			$table->integer('buyer_id');
			$table->integer('supplier_id');
			$table->float('allocation', 10, 0);
			$table->float('buyer_price', 10, 0);
			$table->float('supplier_price', 10, 0);
			$table->float('buyer_total', 10, 0);
			$table->float('supplier_total', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank_details');
	}

}
