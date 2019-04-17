<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    public function organization(){
 		$this->belongsTo(Organization::class);   
	}
}
