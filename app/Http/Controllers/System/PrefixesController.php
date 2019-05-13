<?php

namespace App\Http\Controllers\System;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Prefix;
use App\Organization;
use App\Lookup;
use App\App;



class PrefixesController extends Controller
{	 
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
		$prefixKeys= Lookup::getPrefixKeys();
		return view('system.prefixes',compact('prefixKeys'));
	}
	
	public function store(Request $data){
		$prefixes= $data->all();
		$org_id= Auth::user()->organization_id;
		
		foreach ($prefixes as $key=>$value)
		$prefix= Prefix::create([
					
					'prefix_key'=> $key,
					'prefix_value'=> $value,
					'organization_id'=> $org_id
			]);  
			
			if($prefix->getValidator()->failed()){
				return new JsonResponse($prefix->getValidator()->errors()->all());
			}
			 
			else{
				return ['message' => 'Successful'];
			}
		}
		
		 
	}
	
	

