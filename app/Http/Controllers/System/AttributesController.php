<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use App\AttributeSet;
use App\Attribute;
use Yajra\DataTables\DataTables;

=======
use Yajra\DataTables\DataTables;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use Illuminate\Http\Illuminate\Http;
use App\Organization;
use App\Attribute;
use App\AttributeSet;
>>>>>>> database-design-2

class AttributesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
	public function show(){
<<<<<<< HEAD
		return view('system.attributes');
	}
	
	public function list(){
		$attribute= new Attribute();
		return DataTables::of($attribute)->make(true);
	}
=======
		$attribute= AttributeSet::where('id', 'attribute_set_id' );
		return view('system.attributes', compact('attribute')); 
	}
	public function list(){
		$attribute= AttributeSet::where('id', 'attribute_set_id' );
		return DataTables::of($attribute)->make(true);
	}
	 
	public function store(Request $data){
		 
		$attribute= Attribute::create([
				'attribute_name'=> $data['attribute_name'],
				'default_value'=> $data['default_value'],
				'required'=> $data['required'],
				'attribute_set_id'=> $data['attribute_set_id']
		]);
		 
		if($attribute->getValidator()->failed()){
			return new JsonResponse($attribute->getValidator()->errors()->all(), 422);
		}
		 
		else{
			return ['message' => 'Successful'];
		}
		 
	}
	 
	public function destroy($id){
		$attribute= Attribute::findOrFail($id);
		$attribute->delete();
	}
>>>>>>> database-design-2
}
