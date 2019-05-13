<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SalesGroup extends Model
{
	protected $table= 'sales_groups';
	
	protected $fillable=['sales_group_name', 'sales_group_field_label', 'organization_id'];
	
	private $validator;
	
	protected $attributes= ['active'=> "1"];
	
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
    			'sales_group_name'=> 'required|string|max:255',
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
