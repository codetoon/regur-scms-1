<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Organization extends Model
{	
	protected $table='organizations';
    
	protected $primaryKey= 'id';
    
    protected $fillable= ['company_name', 'trading_name', 'trading_name_purchase', 
    		 'organization_type', 'base_currency', 'dashboard_data_source', 'gst_vat_number', 
    		'website', 'financial_year_end', 'unit_of_measure', 'date_format',
    		'fax_number', 'ddi', 'tollfree_number', 'purchase_email', 
    		'sales_email', 'physical_address_name', 'physical_address_line_1',
    		 'physical_address_line_2' , 'physical_suburb', 'physical_city', 
    		'physical_state_region', 'physical_postal_code', 'postal_address_name',
    		 'postal_address_line_1', 'postal_address_line_2',
    		'postal_suburb', 'postal_city', 'postal_state_region', 
    		 'postal_postal_code',
    		'industry_id', 'postal_country_id', 'physical_country_id', 'timezone_id' //foreign keys
    ];
    
    private $validator;
    
    public function __construct(array $attributes = [])
    {
    	parent::__construct( $attributes );
    
    }
    
    
    protected static function boot(){
    	parent::boot();
    	 
    	self::saving(function($model){
    		return $model->validate();
    	});
    		 
    }
    
    public function getValidator()
    {
    	return $this->validator;
    }
    
    public function validate(){
    	 
    	$this->validator= Validator::make($this->attributesToArray(), [
    			'company_name'=> 'required|string|max:255'
    	]);
    	 
    	if($this->validator->fails()){
    		return false;
    
    	}
    	else {
    		return true;
    	}
    }
    
    
    public function users(){
    	return $this->hasMany(User::class);
    }
    
    public function industry(){
    	$this->belongsTo(Industry::class);
    }
    
    public function timezone(){
    	$this->belongsTo(Timezone::class);
    }
    
    public function country(){
    	$this->belongsTo(Country::class);
    }
    
    public function adjustmentReasons(){
    	return $this->hasMany(AdjustmentReason::class);
    }
    
    public function attributeSets(){
    	return $this->hasMany(AttributeSet::class);
    }
    
    public function creditReasons(){
    	return $this->hasMany(CreditReason::class);
    }
    
    public function paymentTerms(){
    	return $this->hasMany(PaymentTerm::class);
    }
    
    public function productGroups(){
    	return $this->hasMany(ProductGroup::class);
    }
    
    public function salesGroups(){
    	return $this->hasMany(SalesGroup::class);
    }
    
    public function shippingComp(){
    	return $this->hasMany(ShippingCompany::class);
    }
    
    public function uom(){
    	return $this->hasMany(UnitOfMeasure::class);
    }
}

