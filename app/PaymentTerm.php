<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;
use function Mockery\Fixtures\parent;


class PaymentTerm extends Model
{	
	protected $table= "payment_terms";
	
    protected $fillable= ['name', 'payment_type', 'days', 'organization_id'];
    
    private $validator;
    
    public function __construct($attributes= []){
    	parent::__construct($attributes);
    }
    
    protected static function boot(){
    	parent::boot();
    	
    	self::saving(function ($model){
    		$model->validate();
    	});
    }
    
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
    
    public function getValidator(){
    	return $this->validator;
    }
    
    public function validate(){
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'name'=> 'required|string| max:255',
    			'days'=> 'required|string| max:255',
    			'payment_type'=> 'required| string| max:255',
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
