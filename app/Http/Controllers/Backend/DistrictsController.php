<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $district=District::orderBy('division_id','asc')->get();
        return view('backend.pages.districts.index')->with('districts',$district);
    }
    public function edit($id){
        $divisions =Division::orderBy('priority','asc')->get();
        $district =District::find($id);
        if(!is_null($district)){
            return view('backend.pages.districts.edit',compact('district','divisions'));
        }else{
            return redirect()->back();
        }
    }
    public function create(){
        $divisions =Division::orderBy('priority','asc')->get();
        return view('backend.pages.districts.create',compact('divisions'));
    }

    public function Store(Request $request){

        $request->validate([
            'name' => 'required',
            'division_id' => 'required'
        ],
        [
            'name.required' => 'Please provide a district Name',
            'division_id.required' => 'Please provide a district priority',
        ]
    
    
    );
        $district = new District;
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        if ($district->save()) {
            $notification = array(
                'message' => 'District Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }

       
    }
    public function Update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'division_id' => 'required'
        ],
        [
            'name.required' => 'Please provide a district Name',
            'division_id.required' => 'Please provide a district priority',
        ]
    
    
    );
        $district =District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        if ($district->save()) {
            $notification = array(
                'message' => 'District Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
       
    }
    public function Delete($id){
        $district=District::find($id);
        if(!is_null($district)){
            $district->delete();
        }
        session()->flash('success','District has deleted successfully !!');
        return redirect()->back();
    }
}
