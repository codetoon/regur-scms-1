<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditReason extends Model
{
    protected $fillable= ['credit_reason', 'organization_id'];
    
    public function organizations(){
    	$this->belongsTo(Organization::class);
    }
}
