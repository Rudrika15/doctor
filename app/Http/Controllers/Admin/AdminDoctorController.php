<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
use App\Models\User;

use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    public function index(Request $request, $id)
    {
        $hospitalId = $request->id;
        $doctor = Doctor::where('hospitalId', $hospitalId)
            ->with('hospital')
            ->with('user')
            ->paginate(5);

        return view('admin.doctor.index', compact('doctor'));
    }

    public function create()
    {
        $specialist = Specialist::all();
        $user = User::all();
        return view('admin.doctor.create', compact('user', 'specialist',));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hospitalId' => 'required',
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'userId' => 'required',
            'photo' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required'
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
            return redirect()->back()->with('success', 'Doctor Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $hospital = Hospital::all();
        $specialist = Specialist::all();
        $user = User::all();
        $doctor = Doctor::find($id);
        return view('admin.doctor.edit', compact('doctor', 'hospital', 'user', 'specialist'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'hospitalId' => 'required',
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'userId' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required'
        ]);

        $hospiId = $request->hospitalId;
        $id = $request->doctorId;
        $doctor = Doctor::find($id);
        $doctor->hospitalId = $request->hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        $doctor->userId = $request->userId;

        if ($request->photo) {
            $photo = $request->photo;
            $doctor->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('doctor'), $doctor->photo);
        }
        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;

        $doctor->status = "Active";
        if ($doctor->save()) {

            return redirect()->route("admin.hospital.viewdetails", $hospiId)->with('success', 'Doctor Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = "Delete";
        if ($doctor->save()) {
            return redirect()->back()->with('success', 'Doctor Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
