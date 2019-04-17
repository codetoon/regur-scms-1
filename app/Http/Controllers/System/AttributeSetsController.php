<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeSetsController extends Controller
{
    public function show(){
    	return view('system.attribute_sets');
		}
}
