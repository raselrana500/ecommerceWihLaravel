<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\product;

class PagesController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
}
