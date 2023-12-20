<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Auth;
class AppointmentController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId',$user)->first();
      return  $appointment=Appointment::where('hospitalId',$hospital->id)
        ->whereHas('schedule')
        ->paginate(5);
        return view('hospital.appointment.index',compact('appointment'));

    }
}
