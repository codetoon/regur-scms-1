<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\PaymentTerm;
use App\Organization;

class PaymentTermsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		$organization= Organization::where('id', Auth::user()->organization_id)->get();
		$paymentTerm= PaymentTerm::where('organization_id', Auth::user()->organization_id)->get();
		return view('system.payment_terms', compact('organization', 'paymentTerm'));
	}
	
	protected function validator(Request $data){
		return Validator::make($data, [
				'name'=> ['required', 'string', 'max:255'],
				'days'=> ['required', 'numeric'],
				'payment_type'=> ['required'],
				'organization_id'=> ['required']
		]);
		 
	}
	protected function store(Request $data){
		$organization= Organization::where('id', Auth::user()->organization_id)->get();
		$paymentTerm= PaymentTerm::create([
				'name'=> $data['name'],
				'organization_id'=> $organization[0]->id,
				'days'=> $data['days'],
				'payment_type'=> $data['payment_type']
		]);
		 
		return $paymentTerm;
	}
	 
	protected function destroy($id){
		$paymentTerm= PaymentTerm::findOrFail($id);
		$paymentTerm->delete();
	
		return redirect('/system/paymentTerms');
	}
}
