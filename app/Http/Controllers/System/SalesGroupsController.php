<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Organization;
use Yajra\DataTables\DataTables;
use App\SalesGroup;

class SalesGroupsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
	}
	
	public function show(){
		return view('system.sales-groups');
	}
	
	public function list(){
		$salesGroup= SalesGroup::where('organization_id', Auth::user()->organization_id)->get();
		return DataTables::of($salesGroup)->make(true);
	}
	
public function store(Request $data){
   		$organization= new Organization();
   		
   		$salesGroup= SalesGroup::create([
   			'sales_group_name'=> $data['sales_group_name'],
   			'sales_group_field_label'=> $data['sales_group_field_label'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($salesGroup->getValidator()->failed()){
   			return new JsonResponse($salesGroup->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return response()->json(['Sales group saved successfully']);
   		}
   		
   }
   
   public function destroy($id){
   	$salesGroup= SalesGroup::findOrFail($id);
   	$this->authorize('delete', $salesGroup);
   	$salesGroup->delete();
  }
	
	
}
