<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Schedule;
use App\Models\Specialist;
use App\Models\User;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor = Doctor::paginate(5);

        return view('hospital.doctor.index', compact('doctor'));
    }

    public function create()
    {
        $hospital=Hospital::all();
        $specialist=Specialist::all();
        $user=User::all();
        return view('hospital.doctor.create',compact('hospital','specialist','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'userId' => 'required',
            'photo' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->hospitalId = $request->hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        $doctor->userId = $request->userId;
        $photo = $request->photo;
        $doctor->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('doctor'), $doctor->photo);
        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;

        if ($doctor->save()) {
            return redirect()->back()->with('success', 'Record Added successfully!');
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
            'hospitalId' => 'required',
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'userId' => 'required',
            'photo' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required',

        ]);
        $id = $request->Id;
        $doctor = Doctor::find($id);
        $doctor->hospitalId = $request->hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        $doctor->userId = $request->userId;
        $doctor->photo = $request->photo;
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
