<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
 	 public function edit(){
 		$countries= Country::get();
 		$timezones= Timezone::get();
 		$industries= Industry::get();
 		$units= [1=> 'Metric', 2=> 'Imperial'];
 		$financial_year_endings= [1=> 'January', 2=> 'February', 3=> 'March', 4=>  'April', 5=>  'May',
 				6=> 'June',7=> 'July', 8=> 'August',  9=> 'September',
 				 10=>  'October', 11=>  'November', 12=>  'December'];
 		$date_formats= [1=> 'MM/DD/YY',2=> 'DD/MM/YY',3=> 'YY/MM/DD'];
 		$organization_types= [1=>'Company',2=> 'Personal',3=> 'Partnership',4=> 'SoleTrader',
 			5=> 'Trust',6=> 'Charity', 7=>'Club',8=> 'Society'];
 		$dashboard_data_sources= [ 1=>'Sales Invoice', 2=>'Other'];
 		
 		$user= Auth::User();
 		$organization= Organization::where('id', Auth::user()->organization_id)->get();
 		//$countries= Country::pluck('id', 'country_name');
 		//$timezones= Timezone::pluck('id', 'timezone');
 		return view('company.organization_details', compact('countries', 'timezones', 'industries', 'units',
 				'financial_year_endings','date_formats', 'organization_types', 'dashboard_data_sources', 'organization', 'user'));
 	} 
 	
	
 	protected function validator(Request $data){
 		return validator::make($data, [
 			'trading_name'=> ['required', 'string', 'max:255'],
 			'purchase_email'=> ['required', 'string', 'max:255'],
 			'sales_email'=> ['required', 'string', 'max:255'],
 				
 		]);
 		
 	}
 	protected function update(Request $data){
 		$organization= Organization::where('id', Auth::user()->organization_id)->update($data->except('_token'));
 		return $organization;	
 	}
 	
 	
}
