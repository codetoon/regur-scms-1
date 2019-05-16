<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organization_id');
            $table->string('base_currency');
            $table->string('foreign_currency');
            $table->decimal('buy_rate');
            $table->decimal('sell_rate');
            $table->timestamps();
            
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('base_currency')->references('base_currency')->on('organizations');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_rates');
    }
}
