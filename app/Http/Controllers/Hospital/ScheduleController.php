<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Auth;
class ScheduleController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$user)->first();
        $schedule = Schedule::where('hospitalId','=',$hospital->id)->paginate(20);
        return view('hospital.schedule.index', compact('schedule'));
    }

    public function create()
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$user)->first();
        $doctor=Doctor::where('hospitalId','=',$user)->get();
        return view('hospital.schedule.create',compact('doctor','hospital'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctorId' => 'required',
            'day' => 'required',
            'session' => 'required',
            'time' => 'required'
        ]);

        $schedule = new Schedule();
        $schedule->hospitalId = $request->hospitalId;
        $schedule->doctorId = $request->doctorId;
        $schedule->day = $request->day;
        $schedule->session = $request->session;
        $schedule->time = $request->time;
        if ($schedule->save()) {
            return redirect('hospital/schedule-index')->with('success', 'record added successfully');
        } else {
            return back()->with('error', 'you have no permission for this page');
        }
    }

    public function edit($id)
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$user)->first();
        $schedule = Schedule::find($id);
        $doctor=Doctor::where('hospitalId','=',$user)->get();
        return view('hospital.schedule.edit', compact('schedule','doctor','hospital'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'doctorId' => 'required',
            'day' => 'required',
            'session' => 'required',
            'time' => 'required'
        ]);

        $id = $request->id;
        $schedule = Schedule::find($id);
        $schedule->doctorId = $request->doctorId;
        $schedule->day = $request->day;
        $schedule->session = $request->session;
        $schedule->time = $request->time;
        $schedule->status = "Active";
        if ($schedule->save()) {
            return redirect('hospital/schedule-index')->with('success', 'recored updated successfully');
        } else {
            return back()->with('error', 'you have no permissson for this page !');
        }
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->status = "Deleted";
        if ($schedule->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'you have no permission fot this page');
        }
    }
}
