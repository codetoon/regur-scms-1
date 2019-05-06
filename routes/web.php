<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/signup', 'Auth\RegisterController@create');

Route::get('/company/organizationDetails', 'OrganizationsController@edit'); 
Route::post('/company/organizationDetails', 'OrganizationsController@update'); //update org details

Route::get('/system/adjustment-reasons', 'System\AdjustmentReasonsController@show');
Route::get('/system/adjustment-reasons/list', 'System\AdjustmentReasonsController@list');
Route::post('/system/adjustment-reasons', 'System\AdjustmentReasonsController@store');
Route::delete('/system/adjustment-reasons/{adjustmentReason}', 'System\AdjustmentReasonsController@destroy');

Route::get('/system/credit-reasons', 'System\CreditReasonsController@show');
Route::get('/system/credit-reasons/list', 'System\CreditReasonsController@list');
Route::post('/system/credit-reasons', 'System\CreditReasonsController@store');
Route::delete('/system/credit-reasons/{creditReason}', 'System\CreditReasonsController@destroy');

Route::get('/system/customer-types', 'System\CustomerTypesController@show');
Route::get('/system/customer-types/list', 'System\CustomerTypesController@list');
Route::post('/system/customer-types', 'System\CustomerTypesController@store');
Route::delete('/system/customer-types/{customerType}', 'System\CustomerTypesController@destroy');

Route::get('/system/payment-terms', 'System\PaymentTermsController@show');
Route::get('/system/payment-terms/list', 'System\PaymentTermsController@list');
Route::post('/system/payment-terms', 'System\PaymentTermsController@store');
Route::delete('/system/payment-terms/{paymentTerm}', 'System\PaymentTermsController@destroy');

Route::get('/system/product-groups', 'System\ProductGroupsController@show');
Route::get('/system/product-groups/list', 'System\ProductGroupsController@list');
Route::post('/system/product-groups', 'System\ProductGroupsController@store');
Route::delete('/system/product-groups/{productGroup}', 'System\ProductGroupsController@destroy');

Route::get('/system/sales-groups', 'System\SalesGroupsController@show');
Route::get('/system/sales-groups/list', 'System\SalesGroupsController@list');
Route::post('/system/sales-groups', 'System\SalesGroupsController@store');
Route::delete('/system/sales-groups/{salesGroup}', 'System\SalesGroupsController@destroy');

Route::get('/system/shipping-companies', 'System\ShippingCompaniesController@show');
Route::get('/system/shipping-companies/list', 'System\ShippingCompaniesController@list');
Route::post('/system/shipping-companies', 'System\ShippingCompaniesController@store');
Route::delete('/system/shipping-companies/{shippingCompany}', 'System\ShippingCompaniesController@destroy');

Route::get('/system/units-of-measure', 'System\UnitsOfMeasureController@show');
Route::get('/system/units-of-measure/list', 'System\UnitsOfMeasureController@list');
Route::post('/system/units-of-measure', 'System\UnitsOfMeasureController@store');
Route::delete('/system/units-of-measure/{uom}', 'System\UnitsOfMeasureController@delete');

Route::get('/system/supplier-return-reasons', 'System\SupplierReturnReasonsController@show');
Route::get('/system/supplier-return-reasons/list', 'System\SupplierReturnReasonsController@list');
Route::post('/system/supplier-return-reasons', 'System\SupplierReturnReasonsController@store');
Route::delete('/system/supplier-return-reasons/{supplierReturnReason}', 'System\SupplierReturnReasonsController@destroy');

Route::get('/system/attribute-sets', 'System\AttributeSetsController@show'); 
Route::get('/system/attribute-sets/list', 'System\AttributeSetsController@list');
Route::post('/system/attribute-sets', 'System\AttributeSetsController@store');
Route::delete('/system/attribute-sets/{attributeSet}', 'System\AttributeSetsController@destroy');

Route::get('/system/taxes', 'System\TaxesController@show');
Route::get('/system/taxes/list', 'System\TaxesController@list');
Route::post('/system/taxes', 'System\TaxesController@store');
Route::delete('/system/taxes/{tax}', 'System\TaxesController@destroy');

Route::get('/system/attributes/{attribute}', 'System\AttributesController@show');
Route::get('/system/attributes/list/{attribute}', 'System\AttributesController@list')->name('attributes.list');
Route::post('/system/attributes', 'System\AttributesController@store');
Route::delete('/system/attributes/{attribute}', 'System\AttributesController@destroy');

Route::get('system/attributes', 'System\AttributesController@show');
Route::get('system/attributes/list', 'System\AttributesController@list');
Route::post('system/attributes', 'System\AttributesController@store');
Route::delete('system/attributes/{attribute}', 'System\AttributesController@destroy');



