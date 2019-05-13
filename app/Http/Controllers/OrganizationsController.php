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
use App\Lookup;



class OrganizationsController extends Controller
{	
	public function __construct(){
		$this->middleware('auth');
	}
 	 public function edit(){
 		$countries= Country::get();
 		$timezones= Timezone::get();
 		$industries= Industry::get();
 		$measurementUnits= Lookup::getUnits();
 		$financialYearEndings= Lookup::getFinancialYearEndings();
 		$dateFormats= Lookup::getDateFormats();
 		$organizationTypes= Lookup::getOrganizationTypes() ;
 		$dashboardDataSources= Lookup::getDashboardDataSrc();
 		$organization= Organization::where('id', Auth::user()->organization_id)->get()->all();
 		return view('company.organization_details', compact('countries', 'timezones', 'industries', 'measurementUnits',
 				'financialYearEndings','dateFormats', 'organizationTypes', 'dashboardDataSources', 'organization', 'user'));
 	} 
 	
 	
 	protected function update(Request $data){
 		$organization= Organization::where('id', Auth::user()->organization_id)->update($data->except('_token'));

 		return redirect('/company/organization-details');
 	}
 	

}
