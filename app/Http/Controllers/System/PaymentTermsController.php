<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\PaymentTerm;
use App\Organization;
use Yajra\DataTables\DataTables;

class PaymentTermsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		/* $organization= Organization::where('id', Auth::user()->organization_id)->get();
		$paymentTerm= PaymentTerm::where('organization_id', Auth::user()->organization_id)->get(); */
		return view('system.payment_terms');
	}
	
	public function list(){
		$paymentTerm= PaymentTerm::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($paymentTerm)->make(true);
	}
	
	public function validator(Request $data){
		return Validator::make($data, [
				'name'=> ['required', 'string', 'max:255'],
				'days'=> ['required', 'numeric'],
				'payment_type'=> ['required'],
				'organization_id'=> ['required']
		]);
		 
	}
	public function store(Request $data){
		$organization= new Organization();
		$paymentTerm= PaymentTerm::create([
				'name'=> $data['name'],
				'organization_id'=> Auth::user()->organization_id,
				'days'=> $data['days'],
				'payment_type'=> $data['payment_type']
		]);
		 
		//return $paymentTerm;
	}
	 
	public function destroy(Request $data){
		$paymentTerm= PaymentTerm::findOrFail($data->id);
		$paymentTerm->delete();
	
		//return redirect('/system/payment-terms');
	}
}
