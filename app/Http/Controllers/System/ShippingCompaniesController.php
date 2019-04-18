<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\ShippingCompany;

class ShippingCompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    protected function show(){
    	$organization= Organization::where('id', Auth::User()->organization_id)->get();
    	$shippingComp= ShippingCompany::where('organization_id', Auth::User()->organization_id)->get();
    	
    	return view('system.shipping_companies', compact('organization', 'shippingComp'));
    }
    
    protected function validator(Request $data){
    	return Validator::make($data, [
    			
    	])
    }
}
