<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AdminHospitalTypeController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:hospitaltype-list|hospitaltype-create|hospitaltype-edit|hospitaltype-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:hospitaltype-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:hospitaltype-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:hospitaltype-delete', ['only' => ['delete']]);
    // }

    public function index(Request $request)
    {
        $typeName=$request->typeName;
        $status=$request->status;
       
        if(isset($typeName) && isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('typeName','like',"%$typeName%")
                ->where('status','=',$status)
                ->paginate(10);
                $count = count($hospitaltype);
        }
        else if(isset($typeName) && !isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('typeName','like',"%$typeName%")->paginate(10);
                $count = count($hospitaltype);
        }
        else if(!isset($typeName) && isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('status','=',$status)->paginate(10);
                $count = count($hospitaltype);
        }
        else{
            $hospitaltype = HospitalType::orderBy('typeName', 'ASC')->paginate(10);
            $count = count($hospitaltype);
        }
        return view('admin.hospitaltype.index', compact('hospitaltype','count'));
       
    }
    public function create()
    {
        return view('admin.hospitaltype.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'typeName' => 'required'
        ]);
        $hospitaltype = new HospitalType();
        $hospitaltype->typeName = $request->typeName;
        $hospitaltype->slug = $this->generateSlug($request->typeName);
        if ($hospitaltype->save()) {
            return redirect()->back()->with('success', 'Hospital Type Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($slug)
    {
        $hospitaltype = HospitalType::where('slug','=',$slug)->first();
        return view('admin.hospitaltype.edit', compact('hospitaltype'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'typeName' => 'required'
        ]);
        $slug = $request->slug;
        $hospitaltype = HospitalType::where('slug','=',$slug)->first();
        $hospitaltype->typeName = $request->typeName;
        $hospitaltype->slug = $this->generateSlug($request->typeName);
        $hospitaltype->status = "Active";
        if ($hospitaltype->save()) {
            return redirect('admin/hospitaltype-index')->with('success', 'Hospital Type Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function delete($id)
    {
        $hospitaltype = HospitalType::find($id);
        $hospitaltype->status = "Delete";
        if ($hospitaltype->save()) {
            return redirect('admin/hospitaltype-index')->with('success', 'Hospital Type Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    private function generateSlug($typeName){
        return Str::slug($typeName);
    }
}
