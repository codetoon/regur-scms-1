<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Model' => 'App\Policies\ModelPolicy',
    	'App\CreditReason'=> 'App\Policies\CreditReasonPolicy',
    	'App\AdjustmentReason'=> 'App\Policies\AdjustmentReasonPolicy',
    	'App\CustomerType'=> 'App\Policies\CustomerTypePolicy',
    	'App\PaymentTerm'=> 'App\Policies\PaymentTermPolicy',
    	'App\ProductGroup'=> 'App\Policies\ProductGroupPolicy',
    	'App\SalesGroup'=> 'App\Policies\SalesGroupPolicy',
    	'App\SupplierReturnReason'=> 'App\Policies\SupplierReturnReasonPolicy',
    	'App\Organization'=> 'App\Policies\OrganizationPolicy',
    	'App\UnitOfMeasure'=> 'App\Policies\UnitOfMeasurePolicy',
    	'App\Attribute'=> 'App\Policies\AttributePolicy'
    		
    		
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       //Gate::define('view', 'CreditReason@show');
    }
}
