<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use function Mockery\Fixtures\parent;

class Tax extends Model
{
    protected $table= "taxes";
    
    protected $fillable= ['tax_description', 'tax_code', 'tax_rate', 
    					'sales_tax', 'purchase_tax', 'organization_id' ];
    
    protected $attributes= ['active'=>"1"];
    
    private $validator;
    public function __construct(array $attributes=[]){
    	parent::__construct($attributes);
    }
    
    protected static function boot(){
    	parent::boot();
    	
    	self::saving(function ($model){
    		$model->validate();
    	});
    }
    
    public function getValidator(){
    	return $this->validator;
    }
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
    
    public function validate(){
    	$this->validator= Validator::make($this->attributesToArray(), [
    		'tax_description'=> 'required',
    		'tax_code'=> 'required',
    		'tax_rate'=> 'required',
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
