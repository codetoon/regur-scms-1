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

Route::get('/system/adjustmentReasons', 'System\AdjustmentReasonsController@show');
Route::post('/system/adjustmentReasons', 'System\AdjustmentReasonsController@store');
Route::delete('/system/adjustmentReasons/{adjustment}', 'System\AdjustmentReasonsController@destroy');

Route::get('/system/creditReasons', 'System\CreditReasonsController@show');
Route::post('/system/creditReasons', 'System\CreditReasonsController@store');
Route::delete('/system/creditReasons/{creditReason}', 'System\CreditReasonsController@destroy');

Route::get('/system/customerTypes', 'System\CustomerTypesController@show');
Route::post('/system/customerTypes', 'System\CustomerTypesController@store');
Route::delete('/system/customerTypes/{customerType}', 'System\CustomerTypesController@destroy');

Route::get('/system/paymentTerms', 'System\PaymentTermsController@show');
Route::post('/system/paymentTerms', 'System\PaymentTermsController@store');
Route::delete('/system/paymentTerms/{paymentTerm}', 'System\PaymentTermsController@destroy');

Route::get('/system/productGroups', 'System\ProductGroupsController@show');
Route::post('/system/productGroups', 'System\ProductGroupsController@store');
Route::delete('/system/productGroups', 'System\ProductGroupsController@destroy');

Route::get('/system/shippingCompanies', 'System\ShippingCompaniesController@show');
Route::post('/system/shippingCompanies', 'System\ShippingCompaniesController@store');
Route::delete('/system/shippingCompanies', 'System\ShippingCompaniesController@delete');



Route::get('/system/attributeSets', 'System\AttributeSetsController@show'); 
 