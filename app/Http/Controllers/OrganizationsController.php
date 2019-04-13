<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Country;
use App\Timezone;
use App\Industry;
use App\User;

class OrganizationsController extends Controller
{	
	public function __construct(){
		$this->middleware('auth');
	}
 	public function showForm(){
 		$organization= new Organization();
 		$countries= Country::get();
 		$timezones= Timezone::get();
 		$industries= Industry::get();
 		//$user= User::find($id);
 		//$organization= Organization::where('organization_id', $id)->get();
 		//$countries= Country::pluck('id', 'country_name');
 		//$timezones= Timezone::pluck('id', 'timezone');
 		return view('organization-details-form', compact('countries', 'timezones', 'industries', 'organization', 'users'));
 	}
 	
 	protected function validator(Request $data){
 		return validator::make($data, [
 			'trading_name'=> ['required', 'string', 'max:255'],
 			'purchase_email'=> ['required', 'string', 'max:255'],
 			'sales_email'=> ['required', 'string', 'max:255'],
 				
 		]);
 		
 	}
 	protected function create(Request $data){
 		$organization=Organization::create(request()->except(['_token']));
 			/*	[
 			'trading_name'=> $data['company_name'],
 			'trading_name_purchase'=> $data['company_name'],
 			'organization_type'=> $data['organization_type'],
 			'base_currency'=> $data['base_currency'],
 			'dashboard_data_source'=> $data['dashboard_data_source'],
 			'gst_vat_number'=> $data['gst_vat_number'],
 			'website'=> $data['website'],
 			'financial_year_end'=> $data['financial_year_end'],
 			'unit_of_measure'=> $data['unit_of_measure'],
 			'date_format'=> $data['date_format'],
 			'fax_number'=> $data['fax_number'],
 			'telephone_number'=> $data['telephone_number'],
 			''
 		] 
 		);*/
 		return $organization;	
 		
 		
 	
 	}
 	
 	
}
