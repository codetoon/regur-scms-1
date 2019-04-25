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


class CreditReasonsController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
   public function show(){
   	return view('system.credit_reasons');
   		
   		
   		
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
   		
   	
   }
   
   public function destroy(Request $data){
   	$creditReason= CreditReason::findOrFail($data->id);
   	$creditReason->delete();
   	
   }
   	
   
}

