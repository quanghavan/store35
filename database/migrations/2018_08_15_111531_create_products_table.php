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
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index('products_category_id_foreign');
			$table->string('name', 100)->index('name');
			$table->text('descript', 65535);
			$table->decimal('price', 15, 0);
			$table->decimal('discount', 15, 0)->nullable();
			$table->string('avatar', 100);
			$table->integer('view')->nullable()->default(0);
			$table->timestamps();
			$table->softDeletes();
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
