<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable= [ 'country_name'];
    
    public function organizations(){
    	return $this->hasMany(Organization::class);
    }
    
}
