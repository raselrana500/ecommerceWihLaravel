<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\product;
use App\Models\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $products=product::orderBy('id','desc')->paginate(9);
        return view('frontend.pages.index',compact('products','sliders'));
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function search(Request $request){
        $search = $request->search;
        $products=product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('slug','like','%'.$search.'%')
        ->orderBy('title','desc')
        ->paginate(3);
        return view('frontend.pages.product.search',compact('search','products'));

    }
}
