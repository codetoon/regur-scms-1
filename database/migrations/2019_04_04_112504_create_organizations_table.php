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
			
			
			//contact
			$table->string('fax_number', 255);
			$table->string('telephone_number')->unique();
			$table->string('ddi', 255);
			$table->string('tollfree_number', 255);
			$table->string('purchase_email', 255);
			$table->string('sales_email', 255);
			
			//physical address
			$table->string('physical_address_name', 255);
			$table->string('physical_address_line_1', 255);
			$table->string('physical_address_line_2', 255);
			$table->string('physical_suburb', 255);
			$table->string('physical_city', 255);
			$table->string('physical_state_region', 255);
			$table->unsignedInteger('physical_country_id');
			$table->integer('physical_postal_code');
			
			
			//postal address
			$table->string('postal_address_name', 255);
			$table->string('postal_address_line_1', 255);
			$table->string('postal_address_line_2', 255);
			$table->string('postal_suburb', 255);
			$table->string('postal_city', 255);
			$table->string('postal_state_region', 255);
			$table->unsignedInteger('postal_country_id');
			$table->integer('postal_postal_code');
			
			
			
			 
			$table->foreign('postal_country_id')->references('id')->on('countries');
			$table->foreign('physical_country_id')->references('id')->on('countries');
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
