<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;

class CategoriesController extends Controller
{
    public function index(){

    }

    public function show($id){
        $category = category::find($id);
        if(!is_null($category)){
            return view('frontend.pages.categories.show',compact('category'));
        }else{
            session()->flash('errors','There is no category with this id.');
            return redirect('/');
        }
    }
}
