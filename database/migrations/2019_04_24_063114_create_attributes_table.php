<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table-> string('attribute_name', 255);
			$table-> string('default_value', 255);
			$table->boolean('required')->nullable(0);
			$table->unsignedInteger('attribute_set_id');
			
			$table->foreign('attribute_set_id')->references('id')->on('attribute_sets');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributes', function (Blueprint $table) {
            //
        });
    }
}
