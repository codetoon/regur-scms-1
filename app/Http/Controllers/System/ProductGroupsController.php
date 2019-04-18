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
	
	protected function show(){
		$organization= Organization::where('id', Auth::User()->organization_id)->get();
		$productGroup= ProductGroup::where('organization_id', Auth::User()->organization_id)->get();
		return view('system.product_groups', compact('organization', 'productGroup'));
	}
	
	protected function validator(Request $data){
		return validator::make($data, [
				'product_group_name'=> ['required', 'string', 'max:255'],
				'organization_id'=> ['required']
				
		]);	
	}
	
	protected function store(Request $data){
		$organization= Organization::where('id', Auth::User()->organization_id)->get();
		$productGroup= ProductGroup::create([
				'product_group_name'=> $data['product_group_name'],
				'organization_id'=> $organization[0]->id,
				//'attribute_set_id'=>
		]);
		
	}
	
	protected function destroy($id){
		$productGroup= ProductGroup::findOrFail($id);
		$productGroup->delete();
		
		return redirect('/system/productGroups');
		
	}
}
