<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\AttributeSet;
use App\Attribute;
use Yajra\DataTables\DataTables;


class AttributesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		return view('system.attributes');
	}
	
	public function list(){
		$attribute= new Attribute();
		return DataTables::of($attribute)->make(true);
	}
}
