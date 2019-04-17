<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
 	protected $fillable= ['customer_type', 'organization_id'];
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
