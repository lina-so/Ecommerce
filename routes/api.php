<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(["middleware" => "auth:sanctum"], function () {
//     // Route::apiResource("users", "UserController");
//     // Route::apiResource("roles", "RoleController");
//     // Route::get("permissions", [PermissionController::class, "index"]);

// });


Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);

Route::post("/login",[App\Http\Controllers\Api\AuthController::class,'login']);

Route::middleware('auth:sanctum')->group( function (){
    
    Route::apiResource('settings', App\Http\Controllers\SettingController::class);
    
    Route::apiResource('category', App\Http\Controllers\CategoryController::class);
    
    Route::apiResource('product', App\Http\Controllers\ProductController::class);
    
    Route::apiResource('subproduct', App\Http\Controllers\SubProductController::class);
    
    Route::apiResource('color', App\Http\Controllers\ColorController::class);
    
    Route::apiResource('size', App\Http\Controllers\SizeController::class);
    
    Route::apiResource('userAddress', App\Http\Controllers\userAddressController::class);
    
    Route::get('userAddressone',[App\Http\Controllers\userAddressController::class,'getUserAddress']);
    
    Route::get('categoryprod',[App\Http\Controllers\ProductController::class,'get_category_with_products']);
    
    Route::get('prodsubprod',[App\Http\Controllers\SubProductController::class,'get_product_with_subproducts']);
    
    Route::get('subproductwithinfo',[App\Http\Controllers\SubProductController::class,'get_subproducts_with_info']);

});







