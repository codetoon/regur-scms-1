<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasure extends Model
{
   protected $table= 'units_of_measure';
   
   protected $fillable= ['unit_of_measure', 'organization_id'];
   
   public function organization(){
   	$this->belongsTo(Organization::class);
   }
}
