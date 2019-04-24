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
Route::post('/system/adjustment-reasons', 'System\AdjustmentReasonsController@store');
Route::delete('/system/adjustment-reasons/{adjustment}', 'System\AdjustmentReasonsController@destroy');

Route::get('/system/credit-reasons', 'System\CreditReasonsController@show');
Route::get('/system/credit-reasons/data', 'System\CreditReasonsController@getData')->name('system.creditreason.data');
Route::post('/system/credit-reasons', 'System\CreditReasonsController@store');
Route::delete('/system/credit-reasons', 'System\CreditReasonsController@destroy')->name('system.creditreason.delete');

Route::get('/system/customer-types', 'System\CustomerTypesController@show');
Route::post('/system/customer-types', 'System\CustomerTypesController@store');
Route::delete('/system/customer-types/{customerType}', 'System\CustomerTypesController@destroy');

Route::get('/system/payment-terms', 'System\PaymentTermsController@show');
Route::post('/system/payment-terms', 'System\PaymentTermsController@store');
Route::delete('/system/payment-terms/{paymentTerm}', 'System\PaymentTermsController@destroy');

Route::get('/system/product-groups', 'System\ProductGroupsController@show');
Route::post('/system/product-groups', 'System\ProductGroupsController@store');
Route::delete('/system/product-groups', 'System\ProductGroupsController@destroy');

Route::get('/system/shipping-companies', 'System\ShippingCompaniesController@show');
Route::post('/system/shipping-companies', 'System\ShippingCompaniesController@store');
Route::delete('/system/shipping-companies', 'System\ShippingCompaniesController@delete');



Route::get('/system/attributeSets', 'System\AttributeSetsController@show'); 
 