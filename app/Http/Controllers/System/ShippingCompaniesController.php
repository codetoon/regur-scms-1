<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Organization;
use App\ShippingCompany;
use Yajra\DataTables\DataTables;

class ShippingCompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    public function show(){
    	return view('system.shipping-companies');
    }
    
    public function list(){
    	$shippingComp= ShippingCompany::where('organization_id', Auth::User()->organization_id)->get();
    	return DataTables::of($shippingComp)->make(true);
    }
    
    public function store(Request $data){
    	$organization= new Organization();
    	 
    	$shippingComp= ShippingCompany::create([
    			'company_name'=> $data['company_name'],
    			'organization_id'=> Auth::user()->organization_id
    	]);
    	 
    	if($shippingComp->getValidator()->failed()){
    		return new JsonResponse($shippingComp->getValidator()->errors()->all(), 422);
    	}
    	 
    	else{
    		return response()->json(['Shipping company saved successfully']);
    	}
    }
    
    public function destroy($id){
    	$shippingComp= ShippingCompany::findOrFail($id);
    	$shippingComp->delete();
    }
}
