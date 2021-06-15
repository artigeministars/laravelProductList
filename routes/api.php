<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// products
Route::get('v1/products', [ProductController::class, 'getProducts'])->middleware('logger'); 
Route::post('v1/products', [ProductController::class, 'addProduct'])->middleware('logger'); 
Route::put('v1/products', [ProductController::class, 'updateProduct'])->middleware('logger'); 
Route::put('v1/products', [ProductController::class, 'changeStatusProduct'])->middleware('logger'); 

// filters
Route::get('v1/filter-products/{id}', [ProductController::class, 'getProductsByCategory'])->middleware('logger'); 

/*
Route::get("/v1/products", [
   // 'middleware' => 'logger',
    'uses' => 'Product@sgetProducts'
]);

Route::resource("/v1/products",[\app\Http\Controllers\Product::class,"getProducts"])->middleware('logger');
Route::put("v1/products","Product@updateProduct")->middleware('logger');
*/

// categories
Route::get('v1/categories',[CategoryController::class,'getCategories'])->middleware('logger');