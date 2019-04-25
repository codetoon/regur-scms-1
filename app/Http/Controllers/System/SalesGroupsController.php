<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use Yajra\DataTables\DataTables;
use App\SalesGroup;

class SalesGroupsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		return view('system.sales_groups');
	}
	
	public function list(){
		$salesGroup= SalesGroup::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($salesGroup)->make(true);
	}
}
