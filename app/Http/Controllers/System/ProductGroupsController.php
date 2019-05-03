<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ProductGroup;
use App\Organization;


class ProductGroupsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		return view('system.product-groups');
	}
	
	public function validator(Request $data){
		return validator::make($data, [
				'product_group_name'=> ['required', 'string', 'max:255'],
				'organization_id'=> ['required']
				
		]);	
	}
	
	public function store(Request $data){
		$organization= Organization::where('id', Auth::User()->organization_id)->get();
		$productGroup= ProductGroup::create([
				'product_group_name'=> $data['product_group_name'],
				'organization_id'=> $organization[0]->id,
				//'attribute_set_id'=>
		]);
		return redirect('/system/product-groups');
	}
	
	public function destroy($id){
		$productGroup= ProductGroup::findOrFail($id);
		$productGroup->delete();
		
		//return redirect('/system/product-groups');
		
	}
}
