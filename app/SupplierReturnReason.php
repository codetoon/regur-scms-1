<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SupplierReturnReason extends Model
{	
    protected $table= 'supplier_return_reasons';
    
    protected $fillable=['supplier_return_reason', 'organization_id'];
    
    private $validator;
    
    public function __construct($attributes= []){
    	parent::__construct($attributes);	
    }
    
    protected static function boot(){
    	parent::boot();
    	
    	self::saving(function($model){
    		return $model->validate();
    	});
    }
    
    public function organizations(){
    		$this->belongsTo(Organization::class);
    }
    
    public function getValidator(){
    	return $this->validator;
    }
    
    public function validate(){
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'supplier_return_reason'=> 'required|string|max:255',
    			'organization_id'=> 'required'
    	]);
    	
    	if($this->validator->fails()){
    		return false;
    	}
    	
    	else{
    		return true;
    	}
    }
}
