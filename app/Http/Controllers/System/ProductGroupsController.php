<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\ProductGroup;
use App\Organization;
use App\AttributeSet;
use App\User;


class ProductGroupsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		$attributeSets= AttributeSet::where('organization_id', Auth::user()->organization_id)->get();
		return view('system.product-groups', compact('attributeSets'));
	}
	
	public function list(){
		$productGroup= DB::table('product_groups')->where('product_groups.organization_id', Auth::user()->organization_id)->leftJoin('attribute_sets', 'attribute_sets.id', '=', 'product_groups.attribute_set_id')
					->select('attribute_sets.name', 'product_group_name', 'product_groups.id')->get();
		return DataTables::of($productGroup)->make(true);
	}
	
	public function store(Request $data){
		$organization= new Organization();
		$productGroup= ProductGroup::create([
				'product_group_name'=> $data['product_group_name'],
				'attribute_set_id'=> $data['attribute_set_id'],
				'organization_id'=> Auth::user()->organization_id
		]);
		
		 
		if($productGroup->getValidator()->failed()){
			return new JsonResponse($productGroup->getValidator()->errors()->all(), 422);
		}
		else{
			return response()->json(['Product group saved successfully']);
		}
	}
	 
	protected function destroy( $id){
		$productGroup= ProductGroup::findOrFail($id);
		$this->authorize('delete', $productGroup);
		$productGroup->delete();
	
	}
	
}
