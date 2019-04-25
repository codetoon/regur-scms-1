<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{	
	protected $table= 'customer_types';
	
 	protected $fillable= ['customer_type', 'organization_id'];
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
