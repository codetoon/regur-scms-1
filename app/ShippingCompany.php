<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    protected $fillable= ['company_name', 'organization_id'];
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
