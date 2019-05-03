<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Organization;
use App\Tax;
use Yajra\DataTables\DataTables;

class TaxesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		return view('system.taxes');
	}
	
	public function list(){
		$tax= Tax::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($tax)->make(true);
	}
	
	public function store(Request $data){
    	$organization= new Organization();
    	 
    	$tax= Tax::create([
    			'tax_description'=> $data['tax_description'],
    			'tax_code'=> $data['tax_code'],
    			'tax_rate'=> $data['tax_rate'],
    			'sales_tax'=> $data['sales_tax'],
    			'purchase_tax'=> $data['purchase_tax'],
    			'organization_id'=> Auth::user()->organization_id
    	]);
    	 
    	if($tax->getValidator()->failed()){
    		return new JsonResponse($tax->getValidator()->errors()->all(), 422);
    	}
    	 
    	else{
    		return ['message' => 'Successful'];
    	}
    }
    
    public function destroy($id){
    	$tax= Tax::findOrFail($id);
    	$tax->delete();
    }
}
	