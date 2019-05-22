<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Illuminate\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\AttributeSet;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use App\Organization;
use App\Lookup;
use App\Attribute;

class AttributeSetsController extends Controller
{ 
	public function __construct(){
		$this->middleware('auth');
	}

    public function show(){
    	$attributeSetTypes= Lookup::getAttributeSetTypes();
    	return view('system.attribute-sets', compact('attributeSetTypes'));
	}
	
	public function list(){
		$attributeSet= AttributeSet::where('organization_id', Auth::user()->organization_id	)->get();
		return DataTables::of($attributeSet)
		->editColumn('type', function($row){
			$key= $row->type;
			return Lookup::getAttributeSetTypeLabels($key);
		})->make(true);
	}
	
	public function store(Request $data){
   		$organization= new Organization();
   		$attributeSet= AttributeSet::create([
   			'name'=> $data['name'],
   			'type'=> $data['type'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($attributeSet->getValidator()->failed()){
   			return new JsonResponse($attributeSet->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return response()->json( ['Attribute set saved successfully']);
   		}
   		
   }
   
   public function destroy($id){
   	$attributeSet= AttributeSet::findOrFail($id);
   	$attributes= Attribute::where('attribute_set_id', $id)->get();
   	
   	if($attributes->isEmpty()){
   		$deletedRow= $attributeSet->delete();
   		
   		if($deletedRow == true){
   			return response()->json(['Attribute set deleted successfully']);
   		}
   		
   		else {
   			return response()->json(['This action is unauthorized'], 403);
   		}
   		
   		
   	}
   
   	else{
   		return response()->json(['This attribute set contains attributes'], 422);
   	}
   	
   }
}
