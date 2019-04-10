<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
	/* public function __construct()
	{
		$this->middleware('guest');
	} */
	
	protected function validator(array $data)
	{
		return Validator::make($data, [
				'mobile_number'=>['required', 'numeric'],
		]);
	}
	
	protected function create(array $data)
	{	$conntact= new Contact;
		//$users= User::pluck('id', 'mobile_number');
	
		$contact= Contact::create([
				'user_id'=> auth()->id(),
				'mobile_number'=> $request['mobile_number']
		]);
		return $contact;
	}
}
