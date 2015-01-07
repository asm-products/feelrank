<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSourceIdToTablePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			$table->integer('source_id')->unsigned()->nullable();
			$table->foreign('source_id')->references('id')->on('sources');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function(Blueprint $table)
		{
			//
		});
	}

}
