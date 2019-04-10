<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable= [
    		 'mobile_number', 'user_id'
    ];
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
