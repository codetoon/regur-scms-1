<?php

namespace App\Http\Controllers\Auth;

	
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\User;
use App\Organization;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        	'mobile_number'=>['required', 'numeric'],
<<<<<<< HEAD
=======
        	'country'=>['required', 'string', 'max:255'],
>>>>>>> database-design-2
        	'company_name'=>['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
<<<<<<< HEAD
     protected function create(Request $data)
    {	DB::beginTransaction();
    	try {
    		
    	
    	$organization= Organization::firstOrCreate([
    		'company_name'=> $data['company_name'],
    		
    	]);
    	
    	
    	$splitName= explode(" ", $data['name'], 2);
    	
        $user= User::create([
            'first_name' => $splitName[0],
        	'last_name'=> !empty($splitName[1])? $splitName[1] : "",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        	'organization_id'=> $organization->id,
        	'mobile_number' => $data['mobile_number']
        ]);
        
        DB::commit();
        //return $user;
        //return $organization;
        //return redirect('/organizationDetailForm');
        
       
    	}
    	catch (Exception $e){
    		DB::rollback();
    		echo $e->getMessage();
    	}
    } 
    
 
=======
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        	'mobile_number'=> $data['mobile_number'],
        	'country' => $data['country'],
        	'company_name'=>$data['company_name']
        ]);
        return $user;
    }
>>>>>>> database-design-2
}
