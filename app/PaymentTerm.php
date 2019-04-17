<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;

class PaymentTerm extends Model
{
    protected $fillable= ['name', 'payment_type', 'days', 'organization_id'];
    
    public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
