<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Validator;
use function Mockery\Fixtures\parent;

class AttributeSet extends Model
{	
	protected $table="attribute_sets";
	
	protected $fillable= ['name', 'type', 'organization_id'];
	
	private $validator;
	
	public function __construct(array $attributes= []){
		parent::__construct($attributes);
	}
	protected static function boot(){
		parent::boot();
		
		self::saving(function ($model){
			return $model->validate();
		});
		
		self::deleting(function ($model){
			if(Auth::user()->can('delete', $model)){
				return true;
				}
				
			else{
				return false;
			}
		});
	}
	
    public function organization(){
    	$this->belongsTo('Organization::class');
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
	
	public function attributes(){
		$this->hasMany(Attribute::class);
	}
	
	public function validate(){
		$this->validator= Validator::make($this->attributesToArray(), [
				'name'=> ['required', 'string', 'max:255'],
				'type'=> ['required', 'string', 'max:255'],
				'organization_id'=> ['required']
		]);
		
		if($this->validator->fails()){
			return false;
		}
		
		else{
			return true;
		}
	}
}
