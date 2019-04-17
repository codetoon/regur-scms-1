<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->delete();
        
        $industries= [
        ['industry_name' =>'Agriculture, Forestry, Fishing'],
		['industry_name' =>'Animal Products'],
        ['industry_name' =>'Audio and Electronics'],
		['industry_name' =>'Automotive and Automotive Suppliers'],
        ['industry_name' =>'Beverages(Alcoholic and Non-alcoholic)'],
		['industry_name' =>'Building and Construction'],
        ['industry_name' =>'Commercial Services'],
		['industry_name' =>'Education'],
        ['industry_name' =>'Electrical and Electronic Components'],
		['industry_name' =>'Energy, Chemicals and Petroleum'],
        ['industry_name' =>'Entertainment and Recreation'],
		['industry_name' =>'Fashion, Cosmetics and Accessories'],
        ['industry_name' =>'Financial Services'],
		['industry_name' =>'Food'],
        ['industry_name' =>'Furniture and Fixtures'],
		['industry_name' =>'Health and Wellbeing'],
        ['industry_name' =>'Hotels, Restaurants and Bars'],
		['industry_name' =>'Industrial Equipment and Machinery'],
        ['industry_name' =>'IT Products and Services'],
		['industry_name' =>'Jewellery'],
        ['industry_name' =>'Medical Supplies and Equipment'],
		['industry_name' =>'Metals and Fabrication'],
        ['industry_name' =>'Mining'],
		['industry_name' =>'Office Equipment and Supplies'],
		['industry_name' =>'Pharmaceutical'],
        ['industry_name' =>'Plastic and Rubber Products'],
		['industry_name' =>'Prinitng and Publishing'],
        ['industry_name' =>'Sport and Fitness'],
		['industry_name' =>'Textiles'],
        ['industry_name' =>'Tobacco and other Horticulture Products'],
		['industry_name' =>'Transportation/ Logistics'],
        ['industry_name' =>'Other']
        	
        		
        ];
        		
        		
        	DB::table('industries')->insert($industries);
       
    }
}
