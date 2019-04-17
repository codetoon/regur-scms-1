<?php

namespace App\Http\Controllers\System;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\AdjustmentReason;
use App\Organization;

class AdjustmentReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   		$organization= Organization::where('id', Auth::user()->organization_id)->get();
   		$adjustment= AdjustmentReason::where('organization_id', Auth::user()->organization_id)->get();
   		return view('system.adjustment_reasons', compact('organization', 'adjustment'));
   }
   
   protected function validator(Request $data){
   	return Validator::make($data, [
   			'adjustment_reason'=> ['required', 'string', 'max:255'],
   			'organization_id'=> ['required']
   	]);
   		
   }
   
   protected function store(Request $data){
   		$organization= Organization::where('id', Auth::user()->organization_id)->get();
   		$adjustment= AdjustmentReason::create([
   				'adjustment_reason'=> $data['adjustment_reason'],
   				'organization_id'=> $organization[0]->id
   		]);
   		
   		return $adjustment;
   }
   
   protected function destroy($id){
   	$adjustment= AdjustmentReason::findOrFail($id);
   	$adjustment->delete();
   	
   	return redirect('/system/adjustmentReasons');
   }
   	
   
}
