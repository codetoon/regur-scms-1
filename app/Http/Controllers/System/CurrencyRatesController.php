<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Organization;
use App\User;

class CurrencyRatesController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		return view('system.currency-rates');
	}
}
