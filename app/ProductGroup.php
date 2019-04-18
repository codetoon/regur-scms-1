<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $fillable= ['product_group_name', 'organization_id'];
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
