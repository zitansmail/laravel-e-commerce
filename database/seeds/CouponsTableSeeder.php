<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'coupon_name'=>'coupon_test1',
            'value' => 30 ,
            ]);
        Coupon::create([
            'coupon_name'=>'coupon_test2',
            'value' => 15 ,
            ]);
    }
}
