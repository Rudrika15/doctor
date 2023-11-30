<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDoctorController extends Controller
{

    // function __construct()
    //  {
    //      $this->middleware('permission:doctor-list|doctor-create|doctor-edit|doctor-delete', ['only' => ['index', 'store']]);
    //      $this->middleware('permission:doctor-create', ['only' => ['create', 'store']]);
    //      $this->middleware('permission:doctor-edit', ['only' => ['edit', 'update']]);
    //      $this->middleware('permission:doctor-delete', ['only' => ['delete']]);
    // }
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
            'doctorName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'photo' => 'required',
            'experience' => 'required',
            'registerNumber' => 'required|unique:doctors,registerNumber,'
        ]);
        $user = new User();
        $user->name = $request->doctorName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contactNumber = $request->contactNo;
        $user->assignRole('Doctor');
        $user->save();

        $hId = $request->hospitalId;
        $hospitalData = Hospital::find($hId);
        $hospitalId = $hospitalData->userId;
        $doctor = new Doctor();
        $doctor->hospitalId = $hospitalId;
        $doctor->doctorName = $request->doctorName;
        $doctor->slug = $this->generateSlug($request->doctorName);
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        $doctor->userId = $user->id;

        $photo = $request->photo;
        $doctor->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('doctor'), $doctor->photo);

        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;
        $doctor->save();

        if ($doctor) {
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
            'doctorName' => 'required',
            'contactNo' => 'required',
            'specialistId' => 'required',
            'experience' => 'required',
            // 'registerNumber' => 'required|unique:doctors,registerNumber,'

        ]);

        $hospitalIdData=Hospital::where('userId','=',$request->hospitalId)->first();
        $hospitalID=$hospitalIdData->id;
        $id = $request->doctorId;
        $doctor = Doctor::find($id);
        $doctor->doctorName = $request->doctorName;
        $doctor->slug = $this->generateSlug($request->doctorName);
        
        $doctor->contactNo = $request->contactNo;
        $doctor->specialistId = $request->specialistId;
        // $doctor->userId = $request->userId;

        if ($request->photo) {
            $photo = $request->photo;
            $doctor->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('doctor'), $doctor->photo);
        }
        $doctor->experience = $request->experience;
        $doctor->registerNumber = $request->registerNumber;

        $doctor->status = "Active";
        if ($doctor->save()) {
            return redirect()->route("admin.hospital.viewdetails", $hospitalID)->with('success', 'Doctor Updated successfully!');
            //  return redirect()->back()->with('success', 'Doctor Updated successfully!');

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
    private function generateSlug($hospitalName)
    {
        return Str::slug($hospitalName);
    }
}
