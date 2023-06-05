<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment=Appointment::paginate(5);
        $hospital=Hospital::all();
        $doctor=Doctor::all();
        $patient=Patient::all();
        
        return view('hospital.appointment.index',compact('appointment','hospital','doctor','patient'));

    }
}
