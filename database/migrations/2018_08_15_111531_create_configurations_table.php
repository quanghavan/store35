<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configurations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->unique();
			$table->string('screen', 128);
			$table->string('os', 128);
			$table->string('back_camera', 100);
			$table->string('front_camera', 100);
			$table->string('ram', 100);
			$table->string('memory', 100);
			$table->string('battery_capacity', 100);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configurations');
	}

}
