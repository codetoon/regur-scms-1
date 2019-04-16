<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
 		$user= Auth::User();
 		$organization= Organization::where('id', Auth::user()->organization_id)->get();
 		//$countries= Country::pluck('id', 'country_name');
 		//$timezones= Timezone::pluck('id', 'timezone');
 		return view('organization_details', compact('countries', 'timezones', 'industries', 'organization', 'user'));
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
