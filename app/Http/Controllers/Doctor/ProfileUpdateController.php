<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileUpdateController extends Controller
{
    public function edit(){ 
        $specialist=Specialist::all();
        $user=Auth::user()->id;
        $userData=User::where('id','=',$user)->first();
        $doctor=Doctor::where('userId','=',$user)->first();
        return view('doctor.profile.edit',compact('doctor','specialist','userData'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'doctorName'=>'required',
            'specialistId'=>'required',
            'contactNo'=>'required',
            'email'=>'required',
            'experience'=>'required',
        ]);
        $id=$request->doctorId;
        $doctor=Doctor::find($id);
        $doctor->doctorName=$request->doctorName;
        $doctor->slug=$this->generateSlug($request->doctorName);
        $doctor->specialistId=$request->specialistId;
        $doctor->contactNo=$request->contactNo;
        if($request->photo){
            $image=$request->photo;
            $doctor->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $doctor->photo);
        }
        $doctor->experience=$request->experience;
        $doctor->save();

        $userId=Auth::user()->id;
        $user=User::find($userId);
        $user->name=$doctor->doctorName;
        $user->email=$request->email;
        $user->contactNumber=$request->contactNo;
        $user->save();

        return redirect()->back()->with('success', 'Doctor Profile Updated Successfully');
    }

    private function generateSlug($doctorName){
        return Str::slug($doctorName);
    }
}
