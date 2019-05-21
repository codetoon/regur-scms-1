<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\AttributeSet;
use App\Attribute;
use Yajra\DataTables\DataTables;


class AttributesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show($id){
		$attributeSet= AttributeSet::where('id', $id)->get();
		$attributeSets= AttributeSet::where('organization_id', Auth::user()->organization_id)->get();
		return view('system.attributes', compact('attributeSet'));		
	}
	
	public function list($id){
		$attribute= Attribute::where('attribute_set_id', $id)->get()->all();
		/* $attribute= DB::table('attributes')->where('attributes.attribute_set_id', $id)->join('attribute_sets', 'attribute_sets.id', '=', 'attributes.attribute_set_id')
		->select('attribute_name', 'default_value')->get(); */
		return DataTables::of($attribute)->make(true);
		
	}
	
	public function store(Request $data){
		$attribute= Attribute::create([
				'attribute_name'=> $data['attribute_name'],
				'default_value'=> $data['default_value'],
				'required'=> $data['required'],
				'attribute_set_id'=> $data['attribute_set_id']
		]);
		
		if($attribute->getValidator()->failed()){
			return new JsonResponse($attribute->getValidator()->errors()->all(), 422);
		}
		
		else{
			return response()->json( ['Attribute saved successfully']);
		}
	}
	
	public function destroy($id){
		$attribute= Attribute::findOrFail($id);
		$deletedRow= $attribute->delete();
		
		if($deletedRow == true){
			return response()->json(['Attribute deleted successfully']);
		}
		
		else {
			return abort(403, 'This action is unauthorized');
		}
		
		
	
	}
	

}
