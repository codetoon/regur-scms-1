<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Organization;
use App\SupplierReturnReason;
use Yajra\DataTables\DataTables;
use App\App;

class SupplierReturnReasonsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	public function show(){
		
		$supplierReturnReason = SupplierReturnReason::get();
		//$this->authorize('view', $supplierReturnReason);
		return view('system.supplier-return-reasons');
	}
	
	public function list(SupplierReturnReason $supplierReturnReason){
		$supplierReturnReason= SupplierReturnReason::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($supplierReturnReason)->make(true);
	}
	
	public function store(Request $data){
		$organization= new Organization();
		
		$supplierReturnReason= SupplierReturnReason::create([
				'supplier_return_reason'=> $data['supplier_return_reason'],
				'organization_id'=> Auth::user()->organization_id
		]);
		
		if($supplierReturnReason->getValidator()->failed()){
			return new JsonResponse($supplierReturnReason->getValidator()->errors()->all(), 422);
		}
		
		else{
			return response()->json(['Supplier return reason saved successfully']);
		}
	}
	
	public function destroy($id){
		$supplierReturnReason= SupplierReturnReason::findOrFail($id);
		$deletedRow= $supplierReturnReason->delete();
		
		if($deletedRow== true){
			return response()->json(['Supplier return reason deleted successfully']);
		}
		else{
			return response()->json(['This action is unauthorized'], 403);
		}
	}
}
