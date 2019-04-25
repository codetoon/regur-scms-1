<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\SupplierReturnReason;
use Yajra\DataTables\DataTables;

class SupplierReturnReasonsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	public function show(){
		return view('system.supplier_return_reasons');
	}
	
	public function list(){
		$supplierReturnReason= SupplierReturnReason::where('organization_id', Auth::user()->organization_id);
		return DataTables::of($supplierReturnReason)->make(true);
	}
}
