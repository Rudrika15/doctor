<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(){

        $education=Education::paginate(5);
        return view('doctor.education.index',compact('education'));
    }
    public function create(){
        $doctor=Doctor::all();
        return view('doctor.education.create',compact('doctor'));
    }
    public function store(Request $request){
        $request->validate([
            'doctorId'=>'required',
            'education'=>'required'
        ]);

        $education=New Education();
        $education->doctorId=$request->doctorId;
        $education->education=$request->education;
        if($education->save())
        {
            return redirect()->back()->with('success','redord added succesfully');
        }else{
            return back()->with('error','you have no permission');
        }
    }
    public function edit($id){
        $education =Education::find($id);
        $doctor=Doctor::all();
        return view('doctor.education.edit',compact('education','doctor'));
    }
    public function update(Request $request){
        $request->validate([
            'doctorId'=>'required',
            'education'=>'required'
        ]);

        $id=$request->id;
        $education=Education::find($id);
        $education->doctorId=$request->doctorId;
        $education->education=$request->education;
        $education->status="Active";
       if( $education->update()){
        return redirect('doctor/education-index')->with('success', 'record updated successfully');

       }else{
        return back()->with('error','you have no permission');

       }
        
    }
    public function destroy($id){
        $education=Education::find($id);
        $education->status="Deleted";
        if ($education->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
