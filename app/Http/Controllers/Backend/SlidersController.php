<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;

use Image;
use File;


class SlidersController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $sliders=Slider::orderBy('priority','asc')->get();
        return view('backend.pages.sliders.index',compact('sliders'));
    }
    // public function edit($id){
    //     $divisions =Division::find($id);
    //     if(!is_null($divisions)){
    //         return view('backend.pages.divisions.edit')->with('division',$divisions);
    //     }else{
    //         return redirect()->back();
    //     }
    // }
    // public function create(){
    //     return view('backend.pages.divisions.create');
    // }

    public function Store(Request $request){

        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'priority' => 'required',
            'button_link' => 'nullable|url'
        ],
        [
            'title.required' => 'Please provide a Slider Title',
            'priority.required' => 'Please provide slider priority',
            'image.required' => 'Please provide slider image',
            'image.image' => 'Please provide a valid slider image',
            'button_link.url' => 'Please provide a valid slider button link'
        ]
    
    );
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imgName = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('images/sliders/'.$imgName);
            Image::make($image)->resize(1920, 800)->save($location);
            $slider->image = $imgName;
        $slider->save();
        if ($slider->save()) {
            session()->flash('success','slider Added successfully !!');
            return redirect()->back();
        }else{
            return redirect()->back();
        }

       
    }
}
public function update(Request $request,$id){

    $request->validate([
        'title' => 'required',
        'image' => 'nullable|image',
        'priority' => 'required',
        'button_link' => 'nullable|url'
    ],
    [
        'title.required' => 'Please provide a Slider Title',
        'priority.required' => 'Please provide slider priority',
        'image.image' => 'Please provide a valid slider image',
        'button_link.url' => 'Please provide a valid slider button link'
    ]

);
    $slider =Slider::find($id);
    $slider->title = $request->title;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;
    if($request->image > 0 ){
        if(File::exists('public/images/sliders/'.$slider->image)){
            File::delete('public/images/sliders/'.$slider->image);
        }
    $image = $request->file('image');
    $imgName = time().'.'. $image->getClientOriginalExtension();
    $location = public_path('images/sliders/'.$imgName);
    Image::make($image)->resize(1920, 800)->save($location);
    $slider->image = $imgName;
    }  
    $slider->save();
    if ($slider->save()) {
        session()->flash('success','slider updated successfully !!');
        return redirect()->back();
    }else{
        return redirect()->back();
    }

   

}
       
    
public function delete($id){
    $slider=Slider::find($id);
    if(!is_null($slider)){
        if(File::exists('public/images/sliders/'.$slider->image)){
            File::delete('public/images/sliders/'.$slider->image);
    
            }
        $slider->delete();
        }
    session()->flash('success','slider has deleted successfully !!');
    return redirect()->back();
    }
    
}