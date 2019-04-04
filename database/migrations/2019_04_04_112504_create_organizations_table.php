<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('organizations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('company_name', 255);
			$table->string('trading_name', 255);
			$table->string('trading_name_purchase', 255);
			$table->unsignedInteger('industry_id');
			$table->tinyInteger('organization_type');
			$table->string('base_currency', 255);
			$table->tinyInteger('dashboard_data_source');
			$table->string('gst_vat_number', 255);
			$table->string('website', 255);
			$table->unsignedInteger('timezone_id');
			$table->tinyInteger('financial_year_end');
			$table->tinyInteger('unit_of_measure');
			$table->tinyInteger('date_format');
			$table->string('address_name', 255);
			$table->string('address_line_1', 255);
			$table->string('address_line_2', 255);
			$table->string('suburb', 255);
			$table->string('city', 255);
			$table->string('state_region', 255);
			$table->unsignedInteger('country_id');
			$table->integer('postal_code');
			$table->unsignedBigInteger('user_id');
			 
			$table->foreign('user_id')->references('id')->on('users');
			
			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('timezone_id')->references('id')->on('timezones');
			$table->foreign('industry_id')->references('id')->on('industries');  
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            //
        });
    }
}
