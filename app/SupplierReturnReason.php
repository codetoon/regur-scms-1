<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SupplierReturnReason extends Model
{	
    protected $table= 'supplier_return_reasons';
    
    protected $fillable=['supplier_return_reason', 'organization_id'];
    
    public function organizations(){
    		$this->belongsTo(Organization::class);
    }
    
}
