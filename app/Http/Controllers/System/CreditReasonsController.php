<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
//use Yajra\DataTables\Facades\DataTables;
use App\Organization;
use App\CreditReason;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;

//use App\Organization;


class CreditReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   		/* $creditReason= CreditReason::where('organization_id', Auth::user()->organization_id)->get();
   		return view('system.credit_reasons', compact('creditReason'));  */
   	return view('system.credit_reasons');
   		
   		
   		
   }
	 public function getData(){
	 		$creditReason= CreditReason::where('organization_id', Auth::user()->organization_id);
 			return DataTables::of($creditReason)->make(true);
 		}
   
   protected function validator(Request $data){
   	return Validator::make($data, [
   			'credit_reason'=> ['required', 'string', 'max:255'],
   			'organization_id'=>['required']
   	]);
   		
   }
   
   /* protected function store(Request $data){
   		$organization= Organization::where('id', Auth::user()->organization_id)->get();
   		$creditreason= CreditReason::create([
   				'credit_reason'=> $data['credit_reason'],
   				'organization_id'=> $organization[0]->id
   		]);
   		
   		return $creditreason;
   } */
   
   protected function store(Request $data){
   		$organization= new Organization();
   		$creditReason= CreditReason::create([
   			'credit_reason'=> $data['credit_reason'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   	//	return $creditReason;
   		return redirect('system/credit-reasons');
   }
   
   protected function destroy(Request $data){
   	$creditReason= CreditReason::findOrFail($data->id);
   	$creditReason->delete();
   	
   	//return redirect('/system/credit-reasons');
   }
   	
   
}

