<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productImage;
use Image;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $products=product::orderBy('id','desc')->get();
        return view('backend.pages.product.index')->with('products',$products);
    }
    public function edit($id){
        $product =product::find($id);
        return view('backend.pages.product.edit',compact('product'));
    }
    public function create(){
        return view('backend.pages.product.create');
    }

    public function Store(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);



        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->slug=str_slug($product->title);
        $product->category_id=$request->category_id;;
        $product->brand_id=$request->brand_id;;
        $product->admin_id=1;
        $product->save();

        

        // insert image
        // if ($request->hasFile('product_image')) {
        //     $image = $request->file('product_image');
        //     $imgName = time().'.'. $image->getClientOriginalExtension();
        //     $location = public_path('images/products/'.$imgName);
        //     Image::make($image)->resize(175, 255)->save($location);

        //     $product_image = new ProductImage();
        //     $product_image -> product_id = $product->id;
        //     $product_image -> image = $imgName;
        //     $product_image->save();
        // }

        if (count($request->product_image)>0) {
            $i = 0;
            foreach ($request->product_image as $image) {
                $img = time().$i.'.'. $image->getClientOriginalExtension();
                $location = public_path('images/products/'.$img);
                Image::make($image)->resize(175, 255)->save($location);

                $product_image = new ProductImage();
                $product_image -> product_id = $product->id;
                $product_image -> image = $img;
                $product_image -> save();
                $i++;
            }
        }
        if ($product->save()) {
            $notification = array(
                'message' => 'Product Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }

       
    }
    public function Update(Request $request,$id){

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);



        $product =Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;        
        $product->category_id=$request->category_id;;
        $product->brand_id=$request->brand_id;;
        $product->slug=str_slug($product->title);
        
        $product->save();
        // if (count($request->product_image)>0) {
        //     foreach ($request->product_image as $image) {
        //         $img = time().'.'. $image->getClientOriginalExtension();
        //         $location = public_path('images/products/'.$img);
        //         Image::make($image)->resize(175, 255)->save($location);

        //         $product_image = new ProductImage();
        //         $product_image -> product_id = $product->id;
        //         $product_image -> image = $img;
        //         $product_image -> save();
        //     }
        // }
        if ($product->save()) {
            $notification = array(
                'message' => 'Product Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }

       
    
}
    public function Delete($id){
        $product=product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        //Delete all images
        foreach($product->images as $img){
            $file_name = $img->image;
            if(file_exists("public/images/products/".$file_name)){
                unlink('public/images/products/'.$file_name);
            }
            $img->delete();
        }
        session()->flash('success','Product has deleted successfully !!');
        return redirect()->back();
    }


}
