<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\category;
use Image;

class CategoriesController extends Controller
{
    public function index(){
        $categories=category::orderBy('id','desc')->get();
        return view('backend.pages.category.index')->with('categories',$categories);
    }
    public function edit($id){
        $categories =category::find($id);
        return view('backend.pages.category.edit')->with('categories',$categories);
    }
    public function create(){
        $main_categories=category::orderBy('name','asc')->where('parent_id', NULL)->get();
        return view('backend.pages.category.create',compact('main_categories'));
    }

    public function Store(Request $request){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a category Name',
            'image.image' => 'Please provide a valid image with .jpg, .jpeg, .png, .gif Extention.'
        ]
    
    
    );
        $category = new category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        //insert image also
        // $if(count($request->image > 0){
        //     $image = $request->file('image');
        //     $img = time() . '.'. $image->getClientOriginalExtension();
        //     $location = public_path('images/categories/' .img);
        //     Image::make($image)->save($location);
        //     $category->image = $img;
        // })
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $imgName = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$imgName);
            Image::make($image)->save($location);
            $category->image = $imgName;
        }
        $category->save();
        if ($category->save()) {
            $notification = array(
                'message' => 'Category Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }

       
    }
    public function Update(Request $request,$id){

        $request->validate([
            'name' => 'required|max:150',
        ]);
        $category = new category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        if ($category->save()) {
            $notification = array(
                'message' => 'Category Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('backend.pages.category.create')->with($notification);
        }else{
            return redirect()->back();
        }

       
    }
    public function Delete($id){
        $category=category::find($id);
        if(!is_null($category)){
            $category->delete();
        }
        session()->flash('success','Category has deleted successfully !!');
        return redirect()->back();
    }
}
