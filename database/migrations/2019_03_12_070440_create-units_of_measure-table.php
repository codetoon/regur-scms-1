<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsOfMeasureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('units_of_measure', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			$table->tinyInteger('unit_of_measure');
			
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
		Schema::drop('units_of_measure');
	}

}
