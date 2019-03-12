<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefixesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prefixes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			$table->string('prefix_key', 255);
			$table->string('prefix_value', 255);
			
			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prefixes');
	}

}
