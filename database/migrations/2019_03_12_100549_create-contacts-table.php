<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('organization_id');
			$table->string('telephone_number', 255);
			$table->string('fax_number', 255);
			$table->string('mobile_number', 255);
			$table->string('ddi', 255);
			$table->string('tollfree_number', 255);
			$table->string('purchase_email', 255);
			$table->string('purchase_email_comment', 255);
			$table->string('sales_email', 255);
			$table->string('sales_email_comment', 255);
			
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
		Schema::drop('contacts');
	}

}
