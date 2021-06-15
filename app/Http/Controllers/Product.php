<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProducts(Request $request)
    {
       // return Product::latest()->get();

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')->get(['products.*', 'categories.name']);
    
        // return $products;
        return Product::latest()->get();
        }

    
            public  function addProduct(Request $request){
                $product = new Product();
             //   $todo->text = $request->get("text");
             //   $todo->status = $request->get("status");
            //    $todo->save();
        
                return response()->json([
                'message' => "product successfully added"
                ]);
                /*
                return response("todo successfully added", 201)->header('Content-Type', 'text/html');
                */
                }
        
                public function updateProduct(Request $request){
                // $todo = Todos::find($request->get('id'));
                // $todo->text= $request->get('text');
                // $todo->status = $request->get("status");
                // $todo->update();
        
                return response()->json([
                   "message" => "product updated successfully"
                ]);
                }
        
            public function changeStatusProduct(Request $request){
               // $todo = Todos::find($request->get('id'));
               // $todo->delete();
        
                return response()->json([
                    "message" => "product status successfully updated"
                ]);
            }
}
