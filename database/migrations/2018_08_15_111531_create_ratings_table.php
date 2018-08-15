<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('rating');
			$table->integer('rateable_id')->unsigned()->index();
			$table->string('rateable_type', 191)->index();
			$table->integer('user_id')->unsigned()->index();
			$table->index(['rateable_id','rateable_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}
