<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::paginate(5);
        return view('hospital.schedule.index', compact('schedule'));
    }
    public function create()
    {
        return view('hospital.schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
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
            return redirect()->back()->with('success', 'record added successfully');
        } else {
            return back()->with('error', 'you have no permission for this page');
        }
    }
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('hospital.schedule.edit', compact('schedule'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
            'doctorId' => 'required',
            'day' => 'required',
            'session' => 'required',
            'time' => 'required'
        ]);

        $id = $request->id;

        $schedule = Schedule::find($id);
        $schedule->hospitalId = $request->hospitalId;
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

    public function destroy($id){
        $schedule=Schedule::find($id);
        $schedule->status="Deleted";
        if($schedule->save()){
            return redirect('hospital/schedule-index')->with('success','record deleted');
        }
        else{
            return back()->with('error','you have no permission fot this page');
        }

    }
}
