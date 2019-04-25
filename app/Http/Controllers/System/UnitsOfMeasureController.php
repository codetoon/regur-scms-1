<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\UnitOfMeasure;
use Yajra\DataTables\DataTables;

class UnitsOfMeasureController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');	
	}
	
	public function show(){
		return view('system.uom');
	}
	public function list(){
		$uom= UnitOfMeasure::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($uom)->make(true);
	}
}
