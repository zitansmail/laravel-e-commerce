<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        $coupon = Coupon::couponFind($request->coupon);
        if ($coupon) {
            session()->put('key', $coupon->value);
            return redirect()->route('checkout.index')->with('success_message','Coupon was applied succesfully');
            
            
            /* dd()) ; */
        }
        return redirect()->route('checkout.index')->with('error','Coupon does not exist');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        
    }
}
