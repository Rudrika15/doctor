<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSpecialistController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:specialist-list|specialist-create|specialist-edit|specialist-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:specialist-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:specialist-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:specialist-delete', ['only' => ['delete']]);
    // }

    public function index(Request $request)
    {
        $specialistName=$request->specialistName;
        $status=$request->status;

        if(isset($specialistName) && isset($status)){
            $specialist=Specialist::orderBy('specialistName', 'ASC')
                ->where('specialistName','like',"%$specialistName%")
                ->where('status','=',$status)
                ->paginate(5);
                $count=count($specialist);
        }
        else if(isset($specialistName) && !isset($status)){
            $specialist=Specialist::orderBy('specialistName', 'ASC')
                ->where('specialistName','like',"%$specialistName%")
                ->paginate(5);
                $count=count($specialist);
        }
        else if(!isset($specialistName) && isset($status)){
            $specialist=Specialist::orderBy('specialistName', 'ASC')
                ->where('status','=',$status)
                ->paginate(5);
                $count=count($specialist);
        }
        else{
            $specialist = Specialist::orderBy('specialistName', 'ASC')
                    ->paginate(5); 
            $count=count($specialist);  
        }
        return view('admin.specialist.index', compact('specialist','count'));
    }

    public function create()
    {
        return view('admin.specialist.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'specialistName' => 'required',
            'details' => 'required'
        ]);
        $specialist = new Specialist();
        $specialist->specialistName = $request->specialistName;
        $specialist->slug = $this->generateSlug($request->specialistName);
        $specialist->details = $request->details;
        $specialist->save();

        if ($specialist->save()) {
            return redirect()->back()->with('success', 'Specialist Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($slug)
    {
        $specialist = Specialist::where('slug','=',$slug)->first();
        return view('admin.specialist.edit', compact('specialist'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'specialistName' => 'required',
            'details' => 'required',
        ]);
        $slug = $request->slug;
        $specialist = Specialist::where('slug','=',$slug)->first();
        $specialist->specialistName = $request->specialistName;
        $specialist->slug = $this->generateSlug($request->specialistName);
        $specialist->details = $request->details;
        $specialist->status = "Active";

        if ($specialist->save()) {
            return redirect('admin/specialist-index')->with('success', 'Specialist Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function delete($id)
    {
        $specialist = Specialist::find($id);
        $specialist->status = "Delete";
        $specialist->save();
        if ($specialist->save()) {
            return redirect()->back()->with('success', 'Specialist Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    private function generateSlug($specialistName){
        return Str::slug($specialistName);
    }
}
