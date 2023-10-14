<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\SocialLink;
use App\Models\Patient;
use App\Models\State;
use App\Models\User;
use App\Models\Visitor;
use Auth;

class VisitorController extends Controller
{
    public function index()
    {
        $city=City::all();
        $doctor = Doctor::all();
        if ($doctor) {
            $doctorcount = count($doctor);
        }
        $hospital = Hospital::all();
        if ($hospital) {
            $hospitalcount = count($hospital);
        }
        $specialist = Specialist::all();
        $specialists = $specialist;
        if ($specialist) {
            $specialistcount = count($specialist);
        }
        $slider = Slider::all();
        return view('visitor.index', compact('city','specialist', 'specialists', 'hospital', 'doctor', 'slider', 'hospitalcount', 'specialistcount', 'doctorcount'));
    }
    public function hospitalDetails(Request $request)
    {
        $hospitalId = $request->id;
        $hospital = Hospital::where('id', '=', $hospitalId)->get();

        $specialist = Specialist::all();
        $doctor = Doctor::where('hospitalId', '=', $hospitalId)->get();

        $gallery = Gallery::where('hospitalId', '=', $hospitalId)->get();

        $facility = Facility::where('hospitalId', '=', $hospitalId)->get();

        $sociallink = SocialLink::where('hospitalId', '=', $hospitalId)->get();
        $city=City::all();
        return view('visitor.hospitalDetails', compact('city','hospital', 'doctor', 'specialist', 'gallery', 'facility', 'sociallink'));
    }
    public function hospitalList(){
        $city=City::all();
        $hospital=Hospital::all();
        return view('visitor.hospitals', compact('hospital','city'));
    }
    public function profile()
    {
        $userId = Auth::user()->id;
        $patient = Patient::where('userId', '=', $userId)->with('state')->first();

        $state = State::all();
        return view('visitor.profile', compact('patient', 'state'));
    }
    // public function profile(Request $request, $id)
    // {
    //     $userId = Auth::user()->id;
    //     $patient = Patient::where('userId', '=', $userId);
    //     // $patient = Patient::find($id);
    //     return view('visitor.profile', compact('patient'));
    // }
    public function patientUpdate(Request $request)
    {
        $id = $request->userId;
        $patient = Patient::where('userId', '=', $id)->first();
        $patient->address = $request->address;
        $patient->gender = $request->gender;
        $patient->age = $request->age;
        $patient->contactNo = $request->contactNo;
        $patient->stateId = $request->stateId;
        if ($request->photo) {
            $photo = $request->photo;
            $patient->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $patient->photo);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contactNumber = $request->contactNo;
        $user->save();
        $patient->save();

        return redirect()->back();
    }

    public function visitorsDetail($hospitalId){
        return view('visitor.visitorsDetail');
    }
    public function storVisitorsDetail(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'age'=>'required',
        ]);
        $hospitalId=$request->hospitalId;
        $vistor=new Visitor();
        $vistor->name=$request->name;
        $vistor->phone=$request->phone;
        $vistor->age=$request->age;
        $vistor->hospitalId=$request->hospitalId;

        $vistor->save();
        
        return redirect('/');
    }
}
