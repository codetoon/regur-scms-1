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
use App\AdjustmentReason;
use App\Organization;



class AdjustmentReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   		return view('system.adjustment-reasons');
   }
   
   public function list(){
   		$adjustmentReason= AdjustmentReason::where('organization_id', Auth::user()->organization_id)->get();
   		return DataTables::of($adjustmentReason)->make(true);
   }
   
   public function store(Request $data){
   		$organization= new Organization();
   		$adjustmentReason= AdjustmentReason::create([
   				'adjustment_reason'=> $data['adjustment_reason'],
   				'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($adjustmentReason->getValidator()->failed()){
   			return new JsonResponse($adjustmentReason->getValidator()->errors()->all(), 422);
   		}
   		else{
   			return response()->json( ['Adjustment reason saved successfully']);
   		}
   }
   
   protected function destroy($id){
   	$adjustmentReason= AdjustmentReason::findOrFail($id);
   	$this->authorize('delete', $adjustmentReason);
   	
   	$adjustmentReason->delete();
   	
   	
   }
   	
   
}
