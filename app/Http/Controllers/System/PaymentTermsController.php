<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\PaymentTerm;
use App\Organization;
use Yajra\DataTables\DataTables;

class PaymentTermsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		return view('system.payment-terms');
	}
	
	public function list(){
		$paymentTerm= PaymentTerm::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($paymentTerm)
		->editColumn('payment_type', function($row){			
			return $row['payment_type'];
		})
		->make(true);
	}
	
	public function store(Request $data){
		$organization= new Organization();
		$paymentTerm= PaymentTerm::create([
				'name'=> $data['name'],
				'organization_id'=> Auth::user()->organization_id,
				'days'=> $data['days'],
				'payment_type'=> $data['payment_type']
		]);
		 
		if($paymentTerm->getValidator()->failed()){
   			return new JsonResponse($paymentTerm->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return ['message' => 'Successful'];
   		}
	}
	 
	public function destroy($id){
		$paymentTerm= PaymentTerm::findOrFail($id);
		$paymentTerm->delete();
	
	}
}
