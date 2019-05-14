<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Attribute extends Model
{
    protected $table="attributes";
    
    protected $fillable= ['attribute_name', 'default_value', 'required', 'attribute_set_id'];
	
    private $validator;
    
    public function __construct(array $attributes = [])
    {
    	parent::__construct($attributes);
    
    }
    
    
    protected static function boot(){
    	parent::boot();
    	 
    	self::saving(function($model){
    		return $model->validate();
    	});
    		 
    }
    
    public function attributeSet(){
		$this->belongsTo(AttributeSet::class);
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
    
    public function validate(){
    	 
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'attribute_name'=> 'required|string|max:255',
    			
    	]);
    	 
    	if($this->validator->fails()){
    		return false;
    	}
    	else {
    		return true;
    	}
    }
}
