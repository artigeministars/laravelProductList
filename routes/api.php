<?php

use App\Http\Controllers\ProductController;
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


Route::get('v1/products', [ProductController::class, 'getProducts'])->middleware('logger'); 
Route::post('v1/products', [ProductController::class, 'addProduct'])->middleware('logger'); 
Route::put('v1/products', [ProductController::class, 'updateProduct'])->middleware('logger'); 
Route::put('v1/products', [ProductController::class, 'changeStatusProduct'])->middleware('logger'); 
//Route::get("products","ProductController@products");
//Route::get("v1/products","ProductController@getProducts");

/*
Route::get("/v1/products", [
   // 'middleware' => 'logger',
    'uses' => 'Product@sgetProducts'
]);

// Route::resource('product', 'Product');
// Route::resource("/v1/products",[\app\Http\Controllers\Product::class,"getProducts"])->middleware('logger');
// Route::get("v1/products","Product@getProducts");
// Route::get('test',[ProductController::class, 'getProducts']);
Route::get('v1/products', [ProductController::class, 'getProducts'])->middleware('logger'); 
// Route::get('/v1/products', [ProductController::class,'getProducts']);
 //Route::get("v1/products","ProducControllert@getProducts");
Route::post("v1/products","Product@addProduct")->middleware('logger');
Route::put("v1/products","Product@updateProduct")->middleware('logger');
Route::put("v1/products","Product@changeStatusProduct")->middleware('logger');
*/