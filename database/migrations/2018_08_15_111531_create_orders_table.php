<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('orders_user_id_foreign');
			$table->string('payment', 128);
			$table->string('note', 191)->nullable();
			$table->decimal('amount', 15, 0);
			$table->integer('status')->nullable()->default(0);
			$table->timestamps();
			$table->integer('address_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
