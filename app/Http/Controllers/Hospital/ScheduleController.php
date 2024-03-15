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
    // public function index()
    // {
    //     $user = Auth::user()->id;
    //     $hospital = Hospital::where('userId', '=', $user)->first();
    //     $schedule = Schedule::where('hospitalId', '=', $hospital->id)->paginate(20);
    //     return view('hospital.schedule.index', compact('schedule'));
    // }

    public function create($id)
    {
        $user = Auth::user()->id;
        $doctor = Doctor::where('hospitalId', '=', $user)->where('id', $id)->first();

        $schedule = Schedule::where('doctorId', $doctor->id)->get();
        if (count($schedule) == 0) {
            $schedule1 = new Schedule();
            $schedule1->doctorId = $doctor->id;
            $schedule1->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule1->day = "Sunday";
            $schedule1->save();

            $schedule2 = new Schedule();
            $schedule2->doctorId = $doctor->id;
            $schedule2->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule2->day = "Monday";
            $schedule2->save();

            $schedule3 = new Schedule();
            $schedule3->doctorId = $doctor->id;
            $schedule3->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule3->day = "Tuesday";
            $schedule3->save();

            $schedule4 = new Schedule();
            $schedule4->doctorId = $doctor->id;
            $schedule4->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule4->day = "Wednesday";
            $schedule4->save();

            $schedule5 = new Schedule();
            $schedule5->doctorId = $doctor->id;
            $schedule5->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule5->day = "Thursday";
            $schedule5->save();

            $schedule6 = new Schedule();
            $schedule6->doctorId = $doctor->id;
            $schedule6->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule6->day = "Friday";
            $schedule6->save();

            $schedule7 = new Schedule();
            $schedule7->doctorId = $doctor->id;
            $schedule7->hospitalId = $doctor->hospitalId; // Set hospitalId if needed
            $schedule7->day = "Saturday";
            $schedule7->save();
        }


        return view('hospital.schedule.create', compact('doctor', 'schedule'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'doctorId' => 'required',
        //     'day' => 'required',
        // ]);
        $hospitalId = $request->hospitalId;
        $doctorId = $request->doctorId;
        $schedule =  Schedule::where('hospitalId', $hospitalId)
            ->where('doctorId', $doctorId)
            ->get();
        $data = [];
        foreach ($schedule as $scheduleData) {
            if ($scheduleData->day == "Sunday") {
                $day =  Schedule::where('day', 'LIKE', '%sunday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeSunday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeSunday;
                $day->afterLunchInTime = $request->afterLunchInTimeSunday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeSunday;
                if ($request->holidaySunday)
                    $day->holiday = "Yes";
                else
                    $day->holiday = "No";

                $day->save();
            }

            if ($scheduleData->day == "Monday") {
                $day =  Schedule::where('day', 'LIKE', '%monday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeMonday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeMonday;
                $day->afterLunchInTime = $request->afterLunchInTimeMonday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeMonday;
                if ($request->holidayMonday)
                    $day->holiday = "Yes";
                else
                    $day->holiday = "No";

                $day->save();
            }

            if ($scheduleData->day == "Tuesday") {
                $day =  Schedule::where('day', 'LIKE', '%tuesday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeTuesday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeTuesday;
                $day->afterLunchInTime = $request->afterLunchInTimeTuesday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeTuesday;
                if ($request->holidayTuesday)
                $day->holiday = "Yes";
            else
                $day->holiday = "No";
                $day->save();
            }

            if ($scheduleData->day == "Wednesday") {
                $day =  Schedule::where('day', 'LIKE', '%wednesday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeWednesday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeWednesday;
                $day->afterLunchInTime = $request->afterLunchInTimeWednesday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeWednesday;
                if ($request->holidayWednesday)
                $day->holiday = "Yes";
            else
                $day->holiday = "No";
                $day->save();
                
            }

            if ($scheduleData->day == "Thursday") {
                $day =  Schedule::where('day', 'LIKE', '%thursday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeThursday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeThursday;
                $day->afterLunchInTime = $request->afterLunchInTimeThursday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeThursday;
                if ($request->holidayThursday)
                $day->holiday = "Yes";
            else
                $day->holiday = "No";
                $day->save();
            }

            if ($scheduleData->day == "Friday") {
                $day =  Schedule::where('day', 'LIKE', '%Friday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeFriday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeFriday;
                $day->afterLunchInTime = $request->afterLunchInTimeFriday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeFriday;
                if ($request->holidayFriday)
                $day->holiday = "Yes";
            else
                $day->holiday = "No";
                $day->save();
            }

            if ($scheduleData->day == "Saturday") {
                $day =  Schedule::where('day', 'LIKE', '%Saturday%')
                    ->where('hospitalId', $hospitalId)
                    ->where('doctorId', $doctorId)
                    ->first();
                $day->beforeLunchInTime = $request->beforeLunchInTimeSaturday;
                $day->beforeLunchOutTime = $request->beforeLunchOutTimeSaturday;
                $day->afterLunchInTime = $request->afterLunchInTimeSaturday;
                $day->afterLunchOutTime = $request->afterLunchOutTimeSaturday;
                if ($request->holidaySaturday)
                $day->holiday = "Yes";
            else
                $day->holiday = "No";
                $day->save();
            }
        }

        return redirect('hospital/doctor-index')->with(['success' => 'Schedule updated successfully', 'schedule' => $schedule]);
    }

    // public function edit($id)
    // {
    //     $user = Auth::user()->id;
    //     $hospital = Hospital::where('userId', '=', $user)->first();
    //     $schedule = Schedule::find($id);
    //     $doctor = Doctor::where('hospitalId', '=', $user)->get();
    //     return view('hospital.schedule.edit', compact('schedule', 'doctor', 'hospital'));
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'doctorId' => 'required',
    //         'day' => 'required',
    //         'session' => 'required',
    //         'time' => 'required'
    //     ]);

    //     $id = $request->id;
    //     $schedule = Schedule::find($id);
    //     $schedule->doctorId = $request->doctorId;
    //     $schedule->day = $request->day;
    //     $schedule->session = $request->session;
    //     $schedule->time = $request->time;
    //     $schedule->status = "Active";
    //     if ($schedule->save()) {
    //         return redirect('hospital/schedule-index')->with('success', 'recored updated successfully');
    //     } else {
    //         return back()->with('error', 'you have no permissson for this page !');
    //     }
    // }

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
