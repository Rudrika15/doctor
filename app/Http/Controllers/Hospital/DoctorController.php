<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Schedule;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $hospitalId=Auth::user()->id;

        $doctor = Doctor::with('hospital')->where('hospitalId','=',$hospitalId)->paginate(10);
        return view('hospital.doctor.index', compact('doctor'));
    }

    public function create()
    {
        $hospital=Auth::user()->id;
        $specialist=Specialist::all();
        $user=User::all();
        return view('hospital.doctor.create',compact('hospital','specialist','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'hospitalId' => 'required',
            'doctorName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contactNo' => 'required',
            
        ]);

        $hospitalId= Auth::user()->id;
        $user=new User();
        $user->name=$request->doctorName;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->contactNumber=$request->contactNo;
        $user->assignRole('Doctor');
        $user->save();

        $doctor = new Doctor();
        $doctor->hospitalId = $hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->slug = $request->doctorName;
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        $doctor->userId = $user->id;
        $photo = $request->photo;
        $doctor->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('doctor'), $doctor->photo);
        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;
        $doctor->save();


        // save into schedule
        $sc1 = new Schedule();
        $sc1->hospitalId = $hospitalId;
        $sc1->doctorId = $doctor->id;
        $sc1->day ="Sunday";
        $sc1->save();
        
        $sc2 = new Schedule();
        $sc2->hospitalId = $hospitalId;
        $sc2->doctorId = $doctor->id;
        $sc2->day ="Monday";
        $sc2->save();

        $sc3 = new Schedule();
        $sc3->hospitalId = $hospitalId;
        $sc3->doctorId = $doctor->id;
        $sc3->day ="Tuesday";
        $sc3->save();

        $sc4 = new Schedule();
        $sc4->hospitalId = $hospitalId;
        $sc4->doctorId = $doctor->id;
        $sc4->day ="Wednesday";
        $sc4->save();

        $sc5 = new Schedule();
        $sc5->hospitalId = $hospitalId;
        $sc5->doctorId = $doctor->id;
        $sc5->day ="Thursday";
        $sc5->save();

        $sc6 = new Schedule();
        $sc6->hospitalId = $hospitalId;
        $sc6->doctorId = $doctor->id;
        $sc6->day ="Friday";
        $sc6->save();

        $sc7 = new Schedule();
        $sc7->hospitalId = $hospitalId;
        $sc7->doctorId = $doctor->id;
        $sc7->day ="Saturday";
        $sc7->save();


        if ($doctor) {
            return redirect('hospital/doctor-index')->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $hospital=Hospital::all();
        $specialist=Specialist::all();
        $user=User::all();
        return view('hospital.doctor.edit', compact('doctor','hospital','specialist','user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required',
        ]);
        $id = $request->Id;
        $doctor = Doctor::find($id);
        $doctor->hospitalId = $request->hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        if ($request->photo) {
            $photo = $request->photo;
            $doctor->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('doctor'), $doctor->photo);
        }
        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;

        $doctor->status = "Active";
        if ($doctor->save()) {
            return redirect('hospital/doctor-index')->with('success', 'Record Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = "Deleted";
        if ($doctor->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
