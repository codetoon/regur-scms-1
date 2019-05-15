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
		$prefixes= Prefix::where('organization_id', Auth::user()->organization_id)->get()->toArray();
		$prefix= array_pluck($prefixes, 'prefix_value','prefix_key');
		if(empty($prefix))
		{
			$prefix= Lookup::getPrefix();
		}
		
		return view('system.prefixes',compact('prefixKeys', 'prefix'));
	}
	
	public function store(Request $data){
		$prefixes= $data->all();
		$org_id= Auth::user()->organization_id;
		$prefix= new Prefix();
		foreach ($prefixes as $key=>$value)
		$prefix= Prefix::updateOrCreate([
					
					'prefix_key'=> $key,
					'organization_id'=> $org_id,
			],
			[
					'prefix_value'=> $value
			]
				);  
		return redirect('/system/prefixes');
			
			/* if($prefix->getValidator()->failed()){
				return new JsonResponse($prefix->getValidator()->errors()->all());
			}
			 
			else{
				return redirect('/system/prefixes');
			} */
			
			
		}
		
		 
	}
	
	

