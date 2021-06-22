<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;


class DivisionsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $divisions=Division::orderBy('priority','asc')->get();
        return view('backend.pages.divisions.index')->with('division',$divisions);
    }
    public function edit($id){
        $divisions =Division::find($id);
        if(!is_null($divisions)){
            return view('backend.pages.divisions.edit')->with('division',$divisions);
        }else{
            return redirect()->back();
        }
    }
    public function create(){
        return view('backend.pages.divisions.create');
    }

    public function Store(Request $request){

        $request->validate([
            'name' => 'required',
            'priority' => 'required'
        ],
        [
            'name.required' => 'Please provide a division Name',
            'priority.required' => 'Please provide a division priority',
        ]
    
    
    );
        $division = new Division;
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();
        if ($division->save()) {
            $notification = array(
                'message' => 'Division Added successfully!',
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
            'priority' => 'required'
        ],
        [
            'name.required' => 'Please provide a division Name',
            'priority.required' => 'Please provide a division priority',
        ]
    
    
    );
        $division =Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();
        if ($division->save()) {
            $notification = array(
                'message' => 'Division Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
       
    }
    public function Delete($id){
        $division=Division::find($id);
        if(!is_null($division)){
            //delete all the districts for this division
            $districts = District::where('division_id',$division->id)->get();
            foreach ($districts as $district) {
                $district->delete();
            }
            $division->delete();
        }
        session()->flash('success','Division has deleted successfully !!');
        return redirect()->back();
    }
}
