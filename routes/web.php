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
Route::get('/settings/organizationDetails', 'OrganizationsController@edit'); 
Route::post('/settings/organizationDetails', 'OrganizationsController@update'); //update org details
Route::get('/settings/adjustmentReasons', 'AdjustmentReasonsController@show');