<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFlags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->tinyInteger('reason');
			$table->bigInteger('flaggable_id');
			$table->string('flaggable_type');
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
		Schema::drop('flags');
	}

}
