<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class ProductGroup extends Model
{	
	protected $table="product_groups";
	
    protected $fillable= ['product_group_name','attribute_set_id', 'organization_id'];
    
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
    			'product_group_name'=> ['required', 'string', 'max:255'],
    			'organization_id'=>['required']
    	]);
    	 
    	if($this->validator->fails()){
    		return false;
    	}
    	 
    	else {
    		return true;
    	}
    	 
    }
}
