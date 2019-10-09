<?php

use App\User;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/user', function () {
    $categories = Product::whereBetween('price', [100, 200])->first();
    return $categories;
});

Route::post('/user/post', function (Request $request) {
    $category = Product::create([
        'name' => $request->name,
        'image' => $request->slug,
        'price' => $request->price,
        'description' => $request->description,
    ]);
    return response()->json($category);
});
