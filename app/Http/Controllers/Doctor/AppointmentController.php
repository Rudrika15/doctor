<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(Request $request){
        
        // $appoinment->name=$request->name;
        // $appoinment->email=$request->email;
        // $appoinment->contactNo=$request->contactNo;
        // $appoinment->stateId=$request->stateId;
        // $appoinment->cityId=$request->cityId;
        // $appoinment->hospitalId=$request->hospitalId;
        // $appoinment->doctorId=$request->doctorId;
        // $appoinment->scheduleId=$request->scheduleId;
        // $appoinment->categoryId=$request->categoryId;
        // $appoinment->appointmentDate=$request->appointmentDate;
        // $appoinment->message=$request->message;
        // $appoinment->patientId=1;
        $status=$request->status;
        $userId=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$userId)->first();
        $appointment=Appointment::with('hospital')->where('hospitalId','=',$hospital->id)->paginate(10);
    //  return    view('appointment.index', compact('appointment'));
    }
}
