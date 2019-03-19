<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			//$table->unsignedInteger('default_sales_tax_id');
			//$table->unsignedInteger('default_purchase_tax_id');
			$table->string('tax_description', 255);
			$table->string('tax_code', 255);
			$table->decimal('tax_rate', 5, 2);
			$table->boolean('sales_tax');
			$table->boolean('purchase_tax');
			
			$table->foreign('organization_id')->references('id')->on('organizations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxes');
	}

}
