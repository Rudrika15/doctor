<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HospitalType;
use Illuminate\Http\Request;

class AdminHospitalTypeController extends Controller
{
    public function index(Request $request)
    {
        $typeName=$request->typeName;
        $status=$request->status;
       
        if(isset($typeName) && isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('typeName','=',$typeName)
                ->where('status','=',$status)
                ->paginate(3);
                $count = count($hospitaltype);
        }
        else if(isset($typeName) && !isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('typeName','=',$typeName)->paginate(3);
                $count = count($hospitaltype);
        }
        else if(!isset($typeName) && isset($status)){
            $hospitaltype=HospitalType::orderBy('typeName', 'ASC')
                ->where('status','=',$status)->paginate(3);
                $count = count($hospitaltype);
        }
        else{
            $hospitaltype = HospitalType::orderBy('typeName', 'ASC')->paginate(5);
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
        if ($hospitaltype->save()) {
            return redirect()->back()->with('success', 'Hospital Type Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $hospitaltype = HospitalType::find($id);
        return view('admin.hospitaltype.edit', compact('hospitaltype'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'typeName' => 'required'
        ]);
        $id = $request->hospitaltypeId;
        $hospitaltype = HospitalType::find($id);
        $hospitaltype->typeName = $request->typeName;
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
}
