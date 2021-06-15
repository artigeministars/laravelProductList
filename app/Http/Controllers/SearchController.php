<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearchedProducts(Request $request,$keyword) {
        return Product::join("categories","products.category_id","=","categories.id")->where('product_name','LIKE','%'.$keyword.'%')
        ->orWhere('product_code','LIKE','%'.$keyword.'%')
        ->get(['products.*', 'categories.category_name']);
    }
}
