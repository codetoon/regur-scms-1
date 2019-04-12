<?php

use Illuminate\Database\Seeder;

class TimezonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('timezones')->delete();
    	$timezones =[
    	['timezone' => 'UTC-12:00'],
    	['timezone' => 'UTC-11:00'],
    	['timezone' => 'UTC-10:00'],
    	['timezone' => 'UTC-09:30'],
    	['timezone' => 'UTC-09:00'],
    	['timezone' => 'UTC-08:00'],
    	['timezone' => 'UTC-07:00'],
    	['timezone' => 'UTC-06:00'],
    	['timezone' => 'UTC-05:00'],
    	['timezone' => 'UTC-04:00'],
    	['timezone' => 'UTC-03:30'],
    	['timezone' => 'UTC-03:00'],
    	['timezone' => 'UTC-02:00'],
    	['timezone' => 'UTC-01:00'],
    	['timezone' => 'UTC+-00:00'],
    	['timezone' => 'UTC+01:00'],
    	['timezone' => 'UTC+02:00'],
    	['timezone' => 'UTC+03:00'],
    	['timezone' => 'UTC+03:30'],
    	['timezone' => 'UTC+04:00'],
    	['timezone' => 'UTC+04:30'],
    	['timezone' => 'UTC+05:00'],
    	['timezone' => 'UTC+05:30'],
    	['timezone' => 'UTC+05:45'],
    	['timezone' => 'UTC+06:00'],
    	['timezone' => 'UTC+06:30'],
    	['timezone' => 'UTC+07:00'],
    	['timezone' => 'UTC+08:00'],
    	['timezone' => 'UTC+08:45'],
    	['timezone' => 'UTC+09:00'],
    	['timezone' => 'UTC+09:30'],
    	['timezone' => 'UTC+10:00'],
    	['timezone' => 'UTC+10:30'],
    	['timezone' => 'UTC+11:00'],
    	['timezone' => 'UTC+12:00'],
    	['timezone' => 'UTC+12:45'],
    	['timezone' => 'UTC+13:00'],
    	['timezone' => 'UTC+14:00']
    			];
    	DB::table('timezones')->insert($timezones);
    }
}
