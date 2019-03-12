<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustment_reasons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			$table->string('adjustment_reason', 255);
			
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
		Schema::drop('adjustment_reasons');
	}

}
