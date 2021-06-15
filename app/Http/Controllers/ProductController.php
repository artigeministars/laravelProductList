<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')->get(['products.*', 'categories.category_name']);
    
        return $products;
       // return Product::latest()->get();
        }

    public function getProductsByCategory(Request $request,$id) {
     //   return Product::where('category_id',$id);
     /*  
     return Product::where('category_id', $id)
               ->orderBy('product_name')
               ->get();
               */

              $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
              ->where('category_id', $id)
              ->get(['products.*', 'categories.category_name']);
    

            return $products;
    }

            public  function addProduct(Request $request){
                $product = new Product();
                $product->product_name = $request->get("product_name");
                $product->product_code = $request->get("product_code");
                $product->category_id = $request->get("category_id");
                $product->quantity = $request->get("quantity");
                $product->status = $request->get("status");
                $product->save();
        
                return response()->json([
                'message' => "product successfully added"
                ]);
                /*
                return response("todo successfully added", 201)->header('Content-Type', 'text/html');
                */
                }
        
                public function updateProduct(Request $request){
             
                $product = Product::find($request->get('id'));
                $product->product_name = $request->get("product_name");
                $product->product_code = $request->get("product_code");
                $product->category_id = $request->get("category_id");
                $product->quantity = $request->get("quantity");
                $product->status = $request->get("1");
                $product->update();
        
                return response()->json([
                   "message" => "product updated successfully"
                ]);
                }
        
            public function changeStatusProduct(Request $request){
             
                $product = Product::find($request->get('id'));
                $product->status = $request->get("status");
                $product->update();
        
                return response()->json([
                    "message" => "product status successfully updated"
                ]);
            }
}
