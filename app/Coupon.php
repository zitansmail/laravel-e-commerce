<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function couponFind($coupon) {

        $coupon = self::where('coupon_name', $coupon)->first();
        return $coupon;
        
    }
}

    
