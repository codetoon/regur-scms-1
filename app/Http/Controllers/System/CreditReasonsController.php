<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\CreditReason;
use App\Organization;

class CreditReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   		$organization= Organization::where('id', Auth::user()->organization_id)->get();
   		$creditReason= CreditReason::where('organization_id', Auth::user()->organization_id)->get();
   		return view('system.credit_reasons', compact('organization', 'creditReason'));
   }
   
   protected function validator(Request $data){
   	return Validator::make($data, [
   			'credit_reason'=> ['required', 'string', 'max:255'],
   	]);
   		
   }
   
   protected function store(Request $data){
   		$organization= Organization::where('id', Auth::user()->organization_id)->get();
   		$creditreason= CreditReason::create([
   				'credit_reason'=> $data['credit_reason'],
   				'organization_id'=> $organization[0]->id
   		]);
   		
   		return $creditreason;
   }
   
   protected function destroy($id){
   	$creditreason= CreditReason::findOrFail($id);
   	$creditreason->delete();
   	
   	return redirect('/system/creditReasons');
   }
   	
   
}

