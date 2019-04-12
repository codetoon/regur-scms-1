<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable=[ 'industry' ];
    
    public function organizations(){
    	return $this->hasMany(Organization::class);
    }
}
