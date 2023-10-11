<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EducationController extends Controller
{
    public function index(){
        $user=Auth::user()->id;
        $doctorId=Doctor::where('userId','=',$user)->first();
        $education=Education::where('doctorId','=',$doctorId->id)->paginate(5);
        return view('doctor.education.index',compact('education'));
    }
    public function create(){
        $doctor=Doctor::all();
        return view('doctor.education.create',compact('doctor'));
    }
    public function store(Request $request){
        $request->validate([
            'education'=>'required'
        ]);
        $user=Auth::user()->id;
        $doctorId=Doctor::where('userId','=',$user)->first();
        $education=New Education();
        $education->doctorId=$doctorId->id;
        $education->education=$request->education;
        if($education->save())
        {
            return redirect()->back()->with('success','redord added succesfully');
        }else{
            return back()->with('error','you have no permission');
        }
    }
    public function edit($id){
        $education = Education::find($id);
        return view('doctor.education.edit',compact('education'));
    }
    public function update(Request $request){
       
        $request->validate([
            'education'=>'required'
        ]);
        $userId=Auth::user()->id;
        $doctor=Doctor::where('userId','=',$userId)->first();
        $id=$request->educationId;
        $education=Education::find($id);
        $education->doctorId=$doctor->id;
        $education->education=$request->education;
        if($education->save()){
            return redirect()->back()->with('success','Education Updated Succesfully');
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
