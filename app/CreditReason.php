<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Validator;

class CreditReason extends Model
{	
	private $validator;
	
	protected $table= 'credit_reasons';
	
    protected $fillable= ['credit_reason', 'organization_id'];
    
    
    public function __construct(array $attributes = [])
    {
    	parent::__construct( $attributes );
    	 
    }
    
    
    protected static function boot(){
    	parent::boot();
    	
    	self::saving(function($model){
    		
    		return $model->validate();
    		
    	});
    	
    	self::deleting(function ($model){
			if(Auth::user()->can('delete', $model)){
				return true;
			}
			
			else{
				return false;
			}
			
		});
    	
    	
    }
    
    
    public function organizations(){
    	$this->belongsTo(Organization::class);
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
    
    
    public function validate(){
    	
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'credit_reason'=> 'required|string|max:255',
    			'organization_id'=> 'required'
    	]);
    	
    if($this->validator->fails()){
    		return false;
    	}
    	else {
    		return true;
    	}
    }
}
