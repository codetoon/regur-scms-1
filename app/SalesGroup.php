<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesGroup extends Model
{
	protected $table= 'sales_groups';
	
	protected $fillable=['sales_group_name', 'sales_group_field_label', 'organization_id'];
	
	public function organization(){
    	$this->belongsTo(Organization::class);
    }
}
