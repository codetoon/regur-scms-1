<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\UnitOfMeasure;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use App\Organization;
use Illuminate\Http\Illuminate\Http;

class UnitsOfMeasureController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');	
	}
	
	public function show(){
		return view('system.uom');
	}
	public function list(){
		$uom= UnitOfMeasure::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($uom)->make(true);
	}
	
 	public function store(Request $data){
   		$organization= new Organization();
   		
   		$uom= UnitOfMeasure::create([
   			'unit_of_measure'=> $data['unit_of_measure'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($uom->getValidator()->failed()){
   			return new JsonResponse($uom->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return response()->json(['Measurement unit added successfully']);
   		}
   		
  	 }
   	
   public function destroy($id){
   	$uom= UnitOfMeasure::findOrFail($id);
   	$deletedRow= $uom->delete();
   	
   	if($deletedRow== true){
   		return response()->json(['Unit of measure deleted successfully']);
   	}
   	else{
   		return response()->json(['This action is unauthorized'], 403);
   	}
  		}
   	
   
}
