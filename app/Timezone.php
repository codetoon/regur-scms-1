<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $primaryKey= 'id';
    
    protected $fillable= ['timezone'];
    
    public function organizations(){
    	$this->hasMany(Organization::class);
    }
}
