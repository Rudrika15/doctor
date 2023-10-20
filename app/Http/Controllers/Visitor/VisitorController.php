<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Specialist;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\HospitalType;
use App\Models\SocialLink;
use App\Models\Patient;
use App\Models\State;
use App\Models\User;
use App\Models\Lead;
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
           
            $hospital = Hospital::latest()->take(4)->get();
            if ($hospital) {
                $hospitallist=Hospital::all();
                $hospitalcount = count($hospitallist);
            }
            $specialist = Specialist::all();
            $departments = Specialist::paginate(3);
            $specialists = $specialist;
            if ($specialist) {
                $specialistcount = count($specialist);
            }
            $slider = Slider::all();        
            return view('visitor.index', compact('departments','city','specialist', 'specialists', 'hospital', 'doctor', 'slider', 'hospitalcount', 'specialistcount', 'doctorcount'));
        
        
    }
    public function searchCityWiseData(Request $request){
        $cityId=$request->cityId;
        $city=City::all();
        
        if($cityId){
            $doctor = Doctor::all();
            if ($doctor) {
                $doctorcount = count($doctor);
            }
            $hospital = Hospital::where('cityId','=',$cityId)->get();
            if ($hospital) {
                $hospitalcount = count($hospital);
            }
            $specialist = Specialist::all();
            $departments = Specialist::paginate(5);
            $specialists = $specialist;
            if ($specialist) {
                $specialistcount = count($specialist);
            }
            $slider = Slider::all();        
            return view('visitor.index', compact('departments','city','specialist', 'specialists', 'hospital', 'doctor', 'slider', 'hospitalcount', 'specialistcount', 'doctorcount'));
        
        }
    }
    public function hospitalDetails(Request $request)
    {
        $hospitalId = $request->id;
        
        $hospital = Hospital::with('user')->where('userId', '=', $hospitalId)->get();

        $specialist = Specialist::all();
        $doctor = Doctor::where('hospitalId', '=', $hospitalId)->get();

        $gallery = Gallery::where('hospitalId', '=', $hospitalId)->get();

        $facility = Facility::where('hospitalId', '=', $hospitalId)->get();

        $sociallink = SocialLink::where('hospitalId', '=', $hospitalId)->get();
        $city=City::all();

        
        $visitor=Lead::where('hospitalId','=',$hospitalId)->first();
    
        return view('visitor.hospitalDetails', compact('visitor','city','hospital', 'doctor', 'specialist', 'gallery', 'facility', 'sociallink'));
    }
    public function hospitalList(){
        $city=City::all();
        $hospital=Hospital::all();
        $hospitalType=HospitalType::all();

        
        return view('visitor.hospitals', compact('hospitalType','hospital','city'));
    }
    public function filterHospital(Request $request){
        $hospitalTypeId=$request->hospitalTypeId;
        $hospitalType=HospitalType::all();
        $city=City::all();
        $filterHospital=Hospital::where('hospitalTypeId','=',$hospitalTypeId)->get();
        return view('visitor.filterHospital',compact('filterHospital','hospitalType','city')); 
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
        $hospital=Hospital::with('user')->where('id','=',$hospitalId)->first();

        $user=User::where('id','=',$hospital->userId)->first();

        cookie()->queue('address', $hospital->address, 60); // 1440 minutes (1 day)
        cookie()->queue('email', $user->email, 60); // 1440 minutes (1 day)
        cookie()->queue('contactNo', $hospital->contactNo, 60); // 1440 minutes (1 day)

        $lead=new Lead();
        $lead->name=$request->name;
        $lead->phone=$request->phone;
        $lead->age=$request->age;
        $lead->hospitalId=$request->hospitalId;
        $lead->save();
        
        return redirect()->route('visitor.hospitalDetails', ['id' => $hospitalId]);
    }
    public function specialist(){
        $city=City::all();
        $specialist=Specialist::all();
        return view('visitor.specialist',compact('specialist','city'));
    }

    public function doctorList(Request $request, $id){
        $specialistId=$request->id;
        $city=City::all();
       
        $doctor=Doctor::with('hospital')->where('specialistId','=',$specialistId)->get();
       // $education=Education::where('doctorId','=',$)->first();
        return view('visitor.doctor',compact('doctor','city'));
    }
    
    public function doctorDetails(Request $request){
        $city=City::all();
        $doctorId=$request->id;
        $doctor=Doctor::with('hospital')->with('education')->where('id','=',$doctorId)->get();
        return view('visitor.doctorDetails',compact('city','doctor'));
    }
    public function makeAnApoinment(){
        $city=City::all();
        return view('visitor.makeAnApoinment',compact('city'));
    }
    public function contact(){
        $city=City::all();
        return view('visitor.contact',compact('city'));
    }
}
