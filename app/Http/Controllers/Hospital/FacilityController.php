<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Auth;
class FacilityController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$user)->first();
        $facility = Facility::where('hospitalId','=',$hospital->id)->paginate(10);
        return view('hospital.facility.index', compact('facility'));
    }

    public function create()
    {
        $user=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$user)->first();
        return view('hospital.facility.create',compact('hospital'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
            'title' => 'required',
            'photo' => 'required'
        ]);

        $facility = new Facility();

        $facility->hospitalId = $request->hospitalId;
        $facility->title = $request->title;
        $facility->slug = $request ->title;
        $photo = $request->photo;
        $facility->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('facility'), $facility->photo);

        if ($facility->save()) {
            return redirect()->back()->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $facility = Facility::find($id);
        $hospital=Hospital::all();
        return view('hospital.facility.edit', compact('facility','hospital'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $id = $request->id;
        $facility =  Facility::find($id);
        $facility->title = $request->title;
        $facility->slug = $request ->title;

        if ($request->photo) {
            $photo = $request->photo;
            $facility->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('facility'), $facility->photo);
        }
        $facility->status = "Active";
        if ($facility->save()) {
            return redirect('hospital/facility-index')->with('success', 'Record Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->status = "Deleted";
        if ($facility->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
