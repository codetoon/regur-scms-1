<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\CustomerType;

class CustomerTypesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		$organization= Organization::where('id', Auth::user()->organization_id)->get();
		$customerType= CustomerType::where('organization_id', Auth::user()->organization_id)->get();
		return view('system.customer_types', compact('organization', 'customerType'));
	}
	
	protected function validator(Request $data){
		return Validator::make([
				'customer_type'=> ['required', 'string', 'max:255'],
				'organization_id'=> ['required']
		]);
		
	}
	
	protected function store(Request $data){
		$organization= Organization::where('id', Auth::user()->organization_id)->get();
		$customerType= CustomerType::create([
				'customer_type'=> $data['customer_type'],
				'organization_id'=> $organization[0]->id
		]);
		return $customerType;
	}
	
	protected function destroy($id){
		$customerType= CustomerType::findOrFail($id);
		$customerType->delete();
		
		return redirect('/system/customerTypes');
	}
}
