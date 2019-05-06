<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\AttributeSet;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use App\Organization;
use Illuminate\Http\Illuminate\Http;
use App\Lookup;

class AttributeSetsController extends Controller
{
	/* private $types= [1=>'Product']; */
	public function __construct(){
		$this->middleware('auth');
	}

    public function show(){
    	Lookup::getTypes();
    	return view('system.attribute-sets', compact('types'));
	}
	
	public function list(){
		$attributeSet= AttributeSet::where('organization_id', Auth::user()->organization_id	);
		return DataTables::of($attributeSet)
		->editColumn('type', function(){
			return ;
		}) 
		->make(true);
	}
	
	public function store(Request $data){
   		$organization= new Organization();
   		$attributeSet= AttributeSet::create([
   			'name'=> $data['name'],
   			'type'=> $data['type'],
   			'organization_id'=> Auth::user()->organization_id
   		]);
   		
   		if($attributeSet->getValidator()->failed()){
   			return new JsonResponse($attributeSet->getValidator()->errors()->all(), 422);	
   		}
   		
   		else{
   			return ['message' => 'Successful'];
   		}
   		
   }
   
   public function destroy($id){
   	$attributeSet= AttributeSet::findOrFail($id);
   	$attributeSet->delete();
   }
}
