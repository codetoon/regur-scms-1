<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			$table->string('customer_type', 255);
			
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
		Schema::drop('customer_types');
	}

}
