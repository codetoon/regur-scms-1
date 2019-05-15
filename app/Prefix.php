<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Prefix extends Model
{
    protected $table= "prefixes";
    
    protected $fillable= ['organization_id', 'prefix_value', 'prefix_key'];
    
    private $validator;
    
    protected $primaryKey= "id" ;/* ["id", "organization_id", "prefix_key"]'' */
    
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
    			'organization_id'=> 'required',
    			'prefix_key'=> 'required',
    	]);
    
    	if($this->validator->fails()){
    		return false;
    	}
    
    	else {
    		return true;
    	}
    
    }
    
   
    
}
