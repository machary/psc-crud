<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightplansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flightplans', function(Blueprint $table) {
			$table->increments('id');
			$table->string('airline', 3);
			$table->string('flightnum', 4);
			$table->string('default_dep_time', 4);
			$table->string('destination', 3);
			$table->boolean('blacklisted');
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
		Schema::drop('flightplans');
	}

}
