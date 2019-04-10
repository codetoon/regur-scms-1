<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
   // protected $primaryKey= 'id';
    
    protected $fillable= ['company_name', 'trading_name', 'trading_name_purchase'];
    
    public function users(){
    	return $this->hasMany(User::class);
    }
}
