<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\ShippingCompany;
use Yajra\DataTables\DataTables;

class ShippingCompaniesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    public function show(){
    	return view('system.shipping_companies');
    }
    
    public function list(){
    	$shippingComp= ShippingCompany::where('organization_id', Auth::User()->organization_id)->get();
    	return DataTables::of($shippingComp)->make(true);
    }
    
}
