<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hospital;
use Illuminate\Http\Request;

class AdminFacalityController extends Controller
{
    public function index(){
        $facility=Facility::with('hospital')->paginate(2);
        return view('admin.facility.index',compact('facility'));
    }
    public function create($id){
        $hospital=Hospital::find($id);
        return view('admin.facility.create',compact('hospital'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'hospitalId'=>'required',
            'title'=>'required',
            'photo'=>'required'
        ]);

        $facility=new Facility();
        $facility->hospitalId=$request->hospitalId;
        $facility->title=$request->title;
        $photo=$request->photo;
        $facility->photo=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('admin_img'),$facility->photo);
       
        $facility->save();

        if($facility->save()){
            return redirect()->back()->with('success','Facility Added successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function edit($id){
        $facility=Facility::find($id);
        return view('admin.facility.edit',compact('facility'));
    }
    
    public function update(Request $request){
        $this->validate($request,[
            'hospitalId'=>'required',
            'title'=>'required',
            
        ]);
        $id=$request->facilityId;
        $facility=Facility::find($id);
        $facility->hospitalId=$request->hospitalId;
        $facility->title=$request->title;
        if ($request->photo) {
            $photo = $request->photo;
            $facility->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('admin_img'), $facility->photo);
        }
        $facility->status="Active";
       
        if($facility->save()){
            return redirect('admin/facility-index')->with('success','Facility Edited successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function delete($id){
        $facility=Facility::find($id);
        $facility->status="Delete";
        if($facility->save()){
            return redirect()->back()->with('success','facility Deleted successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
   
}
