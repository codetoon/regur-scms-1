<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ShippingCompany extends Model
{
	protected $table= 'shipping_companies';
	
    protected $fillable= ['company_name', 'organization_id'];
    
    protected $attributes= ['active'=> "1"];
    
    private $validator;
    
    public function __construct(array $attributes = [])
    {
    	parent::__construct( $attributes );
    
    }
    
    
    protected static function boot(){
    	parent::boot();
    	 
    	self::saving(function($model){
    		return $model->validate();
    	});
    		 
    }
    
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
    
    public function validate(){
    	 
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'company_name'=> 'required|string|max:255',
    			'organization_id'=> 'required',
    			
    	]);
    	 
    	if($this->validator->fails()){
    		return false;
    
    	}
    	else {
    		return true;
    	}
    }
    }

