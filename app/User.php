<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{	
	
    use Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'organization_id', 'mobile_number'

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
   private $validator;
    
   public function __construct(array $attributes=[]){
   		parent::__construct($attributes);
   }
   
   protected static function boot(){
   		parent::boot();
   	
   	self::saving(function ($model){
   		return $model->validate();
   	});
   }
    
 	public function organization(){
    	$this->belongsTo('Organization::class');
    }
    
   
   public function getValidator(){
   		return $this->validator;
   }
   
   public function validate(){
		$this->validator= Validator::make($this->attributesToArray(), [
				'first_name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:6', 'confirmed'],
				'mobile_number'=>['required', 'numeric']
		]);
		
   	
   	if($this->validator->fails()){
   		return false;
   	}
   	
   	else{
   		return true;
   	}
   }
    
}
