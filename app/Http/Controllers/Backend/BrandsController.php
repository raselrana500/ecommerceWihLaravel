<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\brand;
use Image;
use File;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $brands=brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }
    public function edit($id){
        $cat =brand::find($id);
        return view('backend.pages.brand.edit',compact('cat'));
    }
    public function create(){
        return view('backend.pages.brand.create');
    }

    public function Store(Request $request){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a brand Name',
            'image.image' => 'Please provide a valid image with .jpg, .jpeg, .png, .gif Extention.'
        ]
    
    
    );
        $brand = new brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        //insert image also
        // $if(count($request->image > 0){
        //     $image = $request->file('image');
        //     $img = time() . '.'. $image->getClientOriginalExtension();
        //     $location = public_path('images/brands/' .img);
        //     Image::make($image)->save($location);
        //     $brand->image = $img;
        // })
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $imgName = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$imgName);
            Image::make($image)->save($location);
            $brand->image = $imgName;
        }
        $brand->save();
        if ($brand->save()) {
            $notification = array(
                'message' => 'brand Added successfully!',
                'alert-type' => 'success'
            );
            return redirect('admin/brand')->with($notification);
        }else{
            return redirect()->back();
        }

       
    }
    public function Update(Request $request,$id){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a brand Name',
            'image.image' => 'Please provide a valid image with .jpg, .jpeg, .png, .gif Extention.'
        ]
    
    
    );
        $brand = brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        if (count([$request->cat_image]) > 0) {
            if(File::exists('public/images/brands/'.$brand->image)){
                File::delete('public/images/brands/'.$brand->image);
        }
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $imgName = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$imgName);
            Image::make($image)->save($location);
            $brand->image = $imgName;
        }
    }
        $brand->save();
        if ($brand->save()) {
            $notification = array(
                'message' => 'brand updated successfully!',
                'alert-type' => 'success'
            );
            return redirect('admin/brand')->with($notification);
        }else{
            return redirect()->back();
        }
    }

    
          

    public function Delete($id){
        $brand=brand::find($id);
        if(!is_null($brand)){
            //if it is parent then delete all sub brand
        //delete brand image
        if(File::exists('public/images/brands/'.$brand->image)){
            File::delete('public/images/brands/'.$brand->image);
        
        }
        $brand->delete();
    }
        session()->flash('success','brand has deleted successfully !!');
        return redirect()->back();
    }
}
