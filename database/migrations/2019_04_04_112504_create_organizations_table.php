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
			$table->string('trading_name', 255)->nullable();
			$table->string('trading_name_purchase', 255)->nullable();
			$table->unsignedInteger('industry_id')->nullable();
			$table->tinyInteger('organization_type')->nullable();
			$table->string('base_currency', 255)->nullable();
			$table->tinyInteger('dashboard_data_source')->nullable();
			$table->string('gst_vat_number', 255)->nullable();
			$table->string('website', 255)->nullable();
			$table->unsignedInteger('timezone_id')->nullable();
			$table->tinyInteger('financial_year_end')->nullable();
			$table->tinyInteger('unit_of_measure')->nullable();
			$table->tinyInteger('date_format')->nullable();
			
			
			//contact
			$table->string('fax_number', 255)->nullable();
			$table->string('telephone_number')->unique()->nullable();
			$table->string('ddi', 255)->nullable();
			$table->string('tollfree_number', 255)->nullable();
			$table->string('purchase_email', 255)->nullable();
			$table->string('sales_email', 255)->nullable();
			
			//physical address
			$table->string('physical_address_name', 255)->nullable();
			$table->string('physical_address_line_1', 255)->nullable();
			$table->string('physical_address_line_2', 255)->nullable();
			$table->string('physical_suburb', 255)->nullable();
			$table->string('physical_city', 255)->nullable();
			$table->string('physical_state_region', 255)->nullable();
			$table->unsignedInteger('physical_country_id')->nullable();
			$table->integer('physical_postal_code')->nullable();
			
			
			//postal address
			$table->string('postal_address_name', 255)->nullable();
			$table->string('postal_address_line_1', 255)->nullable();
			$table->string('postal_address_line_2', 255)->nullable();
			$table->string('postal_suburb', 255)->nullable();
			$table->string('postal_city', 255)->nullable();
			$table->string('postal_state_region', 255)->nullable();
			$table->unsignedInteger('postal_country_id')->nullable();
			$table->integer('postal_postal_code')->nullable();
			
			
			
			 
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
