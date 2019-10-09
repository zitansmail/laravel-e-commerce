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



Auth::routes();

Route::get('/','ProductController@index')->name('products.index');
Route::get('/product/{id}','ProductController@show')->name('products.show');
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart/store','CartController@store')->name('cart.store');
Route::patch('/cart/{id}','CartController@update')->name('cart.update');
Route::get('/cartremove/{id}','CartController@destroy')->name('cart.remove');
Route::get('/products', 'ShopController@index')->name('shop.index');
/* Route::view('/product/show', 'productshow')->name('productshow');
 */Route::get('/checkout', 'CheckOutController@index')->name('checkout.index');
 Route::post('/checkout', 'CheckOutController@store')->name('checkout.store');

 Route::get('/thankyou', 'thankyouController@index')->name('thankyou');
 Route::post('coupon', 'CouponController@store')->name('coupon.store');
 Route::get('/test', function() {
     return view('test');
 });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
