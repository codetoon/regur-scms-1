<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\CreditReason;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use App\Organization;
use Illuminate\Http\Illuminate\Http;


class CreditReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   	return view('system.credit-reasons');
   		
   		
   		
   }
	 public function list(){
	 		$creditReason= CreditReason::where('organization_id', Auth::user()->organization_id);
 			return DataTables::of($creditReason)->make(true);
 		}
   
   public function store(Request $data){
   		$organization= new Organization();
   		
   		$creditReason= CreditReason::create([
   			'credit_reason'=> $data['credit_reason'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($creditReason->getValidator()->failed()){
   			return new JsonResponse($creditReason->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return response()->json( ['Credit reason saved successfully']); 
   		}
   		
   }
   
   public function destroy($id){
   	$creditReason= CreditReason::findOrFail($id);
   	$creditReason->delete();
  }
   	
   
}

