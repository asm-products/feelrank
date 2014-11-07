<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaggables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taggables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('taggable_type')->index();
			$table->bigInteger('taggable_id')->index();
			$table->integer('tag_id')->unsigned()->index();
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
		Schema::drop('taggables');
	}

}
