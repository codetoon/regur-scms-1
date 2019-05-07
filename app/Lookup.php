<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
	
	private static $measurementUnits= [1=> 'Metric', 2=> 'Imperial'];
	private static $financialYearEndings= [1=> 'January', 2=> 'February', 3=> 'March', 4=>  'April',
			 				5=>  'May', 6=> 'June',7=> 'July', 8=> 'August',  9=> 'September',
 								 10=>  'October', 11=>  'November', 12=>  'December'];
	private static $dateFormats= [1=> 'MM/DD/YY',2=> 'DD/MM/YY',3=> 'YY/MM/DD'];
	private static $organizationTypes= [1=>'Company',2=> 'Personal',3=> 'Partnership',4=> 'SoleTrader',
 			5=> 'Trust',6=> 'Charity', 7=>'Club',8=> 'Society'];
	private static $dashboard_data_sources= [ 1=>'Sales Invoice', 2=>'Other'];
	private static $attributeSetTypes= [1=>'Product', 2=>'Other'];
	private static $paymentTypes= [1=>'Days after', 2=>'Days following the end of the month',
			3=> 'Days of the month following', 4=>'End of the month following'
	];
	
	
	public static  function getUnits(){
		return  self::$measurementUnits;
	}
	
	public static function getFinancialYearEndings(){
		return self::$financialYearEndings;
	}
	
	public static function getDateFormats(){
		return self::$dateFormats;
	}
	
	public static function  getOrganizationTypes(){
		return self::$organizationTypes;
	}
	
	public static function getDashboardDataSrc(){
		return self::$dashboard_data_sources;
	}
	
	public static function getAttributeSetTypes(){
		return self::$attributeSetTypes;
	}
	public static function getAttributeSetTypeLabels($selectedKey){
		
		foreach (self::$attributeSetTypes as $key=> $attributeSetType){
			if($selectedKey== $key){
				$result[$key]= $attributeSetType;
			}
		}
		return array_values($result);
	}
	
	public static function getPaymentTypes(){
		return self::$paymentTypes;
	}
	
	public static function getPaymentTypeLabels($selectedKey){
	
		foreach (self::$paymentTypes as $key=> $paymentType){
			if($selectedKey== $key){
				$result[$key]= $paymentType;
			}
		}
		return array_values($result);
	}
	
}
