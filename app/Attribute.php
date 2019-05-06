<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Attribute extends Model
{
<<<<<<< HEAD
    protected $table= "attributes";
    
    protected $fillable= "['attribute_name', 'default_value', 'required']";
	
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
=======
    protected $table= 'attributes';
    
    protected $fillable= ['attribute_name', 'default_value', 'required', 'attribute_set_id'];
    
    private $validator;

    public function __construct(array $attributes= []){
    	parent::__construct($attributes);
    }
    
protected static function boot(){
    	parent::boot();
    	
    	self::saving(function($model){
    		return $model->validate();
    	});
    	
    }
    
    
    public function attributeSets(){
    	$this->belongsTo(AttributeSet::class);
>>>>>>> database-design-2
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
    
    public function validate(){
<<<<<<< HEAD
    	 
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'attribute_name'=> 'required|string|max:255',
    			'organization_id'=> 'required',
    			
    	]);
    	 
    	if($this->validator->fails()){
    		return false;
    
=======
    	
    	$this->validator= Validator::make($this->attributesToArray(), [
    			
    	]);
    	
    if($this->validator->fails()){
    		return false;
    		
>>>>>>> database-design-2
    	}
    	else {
    		return true;
    	}
    }
<<<<<<< HEAD
    }

    
=======
}
>>>>>>> database-design-2
