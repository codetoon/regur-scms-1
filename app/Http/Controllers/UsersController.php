<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user= User::all();	
		 
		 
		return view('users.index', ['user'=> $user]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 public function create(Request $request)
	{			
		return view('users.create',['user'=> $user]);
	}
	 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	/* public function store(Request $request)
	{
		
		
		$input = request()->except('password','confirmPassword');
		$user= new \App\user();
		$user->firstName= request('firstName');
		$user->lastName= request('lastName');
		$user->email= request('email');
		$user->password= bcrypt(request('password'));
		$user->role= request('role');
		
		$user->save();
		return redirect('/users');
	} */
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{	
		$user= \App\user::findOrFail($id);
		return view('users.edit')->with('user', $user);
		return view('users.show')->with('user', $user);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	 public function edit($id)
	{	$user= \App\user::findOrFail($id);
		abort_if($user->id !== auth()->id(), 403);
		return view('users.edit')->with('user', $user);
	} 
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{	
		$user= user::findOrFail($id);
		$user->first_name= request('first_name');
		$user->last_name= request('last_name');
		$user->email= request('email');
		$user->password= bcrypt(request('password'));
		$user->user_status= request('user_status');
		$user->role= request('role');
		$user->save();
		return redirect('/');
	} 
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$user= \App\user::findOrFail($id);
		$user->delete();
		
		return redirect('/users/');
		
	}
	
	/* public function editregister(User $user)
	{
		
		return view('auth.register', ['user'=>$user]);
	} */
}
