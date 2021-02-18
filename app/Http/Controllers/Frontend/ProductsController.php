<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;

class ProductsController extends Controller
{
    
    public function products(){
        $products=product::orderBy('id','desc')->get();
        return view('frontend.pages.product.index')->with('products',$products);
    }
}
