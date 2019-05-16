<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellPriceTiersController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		return view('system.sell-price-tiers');
	}
	
	public function store() {
		
	}
}
