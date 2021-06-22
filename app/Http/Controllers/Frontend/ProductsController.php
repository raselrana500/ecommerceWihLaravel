<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;

class ProductsController extends Controller
{
    
    public function products(){
        $products=product::orderBy('id','desc')->paginate(9);
        return view('frontend.pages.product.index')->with('products',$products);
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->first();
        if(!is_null($product)){
            return view('frontend.pages.product.show',compact('product'));
        }else{
            session()->flash('errors','Sorry !! There is no products by this url...');
            return redirect()->route('products');
        }
    }
}
