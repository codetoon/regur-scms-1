<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Prefix extends Model
{
    protected $table= "prefixes";
    
    protected $fillable= ['organization_id', 'prefix_value', 'prefix_key'];
    
    private $validator;
    
    public function __construct(array $attributes= []){
    	parent::__construct($attributes);
    }
    protected static function boot(){
    	parent::boot();
    
    	self::saving(function ($model){
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
