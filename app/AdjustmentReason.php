<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Organization;

class AdjustmentReason extends Model
{
	protected $fillable= ['adjustment_reason', 'organization_id'];
	
	
    public function organization(){
    	$this->belongsTo('Organization::class');
    }
}
