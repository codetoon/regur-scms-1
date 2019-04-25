<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\CustomerType;
use Yajra\DataTables\DataTables;

class CustomerTypesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		return view('system.customer_types');
	}
	
	public function list(){
		$customerType= CustomerType::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($customerType)->make(true);
	}
	
	public function validator(Request $data){
		return Validator::make([
				'customer_type'=> ['required', 'string', 'max:255'],
				'organization_id'=> ['required']
		]);
		
	}
	
	public function store(Request $data){
		$organization= new Organization();
		$customerType= CustomerType::create([
				'customer_type'=> $data['customer_type'],
				'organization_id'=> Auth::user()->organization_id
		]);
		//return $customerType;
	}
	
	public function destroy(Request $data){
		$customerType= CustomerType::findOrFail($data->id);
		$customerType->delete();
		
		//return redirect('/system/customer-types');
	}
}
