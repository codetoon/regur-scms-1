<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Organization;
use Validator;

class AdjustmentReason extends Model
{
	private $validator;
	
	protected $table= 'adjustment_reasons';
	
	protected $fillable= ['adjustment_reason', 'organization_id'];
	
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
    	$this->belongsTo('Organization::class');
    }
    
    public function validate(){
    	$this->validator= Validator::make($this->attributesToArray(), [
    		'adjustment_reason'=> ['required', 'string', 'max:255'],
    		'organization_id'=>['required']
    	]);
    	if($this->validator->fails()){
    		//return false;
    		return redirect()->back()->withErrors($this->validator);
    	}
    	else {
    		return true;
    	}
    	
    }
}
