<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Organization;
use App\CustomerType;


class CustomerTypesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		return view('system.customer-types');
	}
	
	public function list(){
		$customerType= CustomerType::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($customerType)->make(true);
	}
	
	
	public function store(Request $data){
		$organization= new Organization();
		$customerType= CustomerType::create([
				'customer_type'=> $data['customer_type'],
				'organization_id'=> Auth::user()->organization_id
		]);
		
		if($customerType->getValidator()->failed()){
			return new JsonResponse($customerType->getValidator()->errors()->all(), 422);
		}
		
		else{
			return response()->json( ['Customer type saved successfully']);
		}
	}
	
	public function destroy($id){
		$customerType= CustomerType::findOrFail($id);
		$customerType->delete();
		
	}
}
