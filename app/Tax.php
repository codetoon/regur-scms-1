<?php

namespace App;
use Validator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tax extends Model
{	
	protected $table="taxes";
	
	protected $fillable= ['tax_description', 'tax_code', 'tax_rate', 'sales_tax', 
							'purchase_tax', 'organization_id'];
	
	protected $attributes= ['active'=> "1"];
	
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
	
	
	public function organization(){
		$this->belongsTo(Organization::class);
	}
	
	public function getValidator()
	{
		return $this->validator;
	}
	
	public function validate(){
	
		$this->validator= Validator::make($this->attributesToArray(), [
				'tax_description'=> 'required|string|max:255',
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
	
	
	
