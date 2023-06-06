<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\HospitalType;
use App\Models\Gallery;
use App\Models\Facility;

use Illuminate\Http\Request;

class AdminHospitalController extends Controller
{
    public function index()
    {
        $hospital = Hospital::with('hospitalType')
            ->with('city')
            ->with('user')
            ->paginate(5);

        return view('admin.hospital.index', compact('hospital'));
    }

    public function create()
    {
        $user = User::all();
        $city = City::all();
        $hospitaltype = HospitalType::all();
        return view('admin.hospital.create', compact('city', 'hospitaltype', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hospitalName' => 'required',
            'address' => 'required',
            'cityId' => 'required',
            'contactNo' => 'required',
            'hospitalTypeId' => 'required',
            'userId' => 'required',
            'siteUrl' => 'required',
            'category' => 'required',
            'hospitalLogo'=>'required'
        ]);

        $hospital = new Hospital();
        $hospital->hospitalName = $request->hospitalName;
        $hospital->address = $request->address;
        $hospital->cityId = $request->cityId;
        $hospital->contactNo = $request->contactNo;
        $hospital->hospitalTypeId = $request->hospitalTypeId;
        $hospital->userId = $request->userId;
        $hospital->siteUrl = $request->siteUrl;
        $hospital->category = $request->category;
            
        $hospitalLogo = $request->hospitalLogo;
        $hospital->hospitalLogo = time() . '.' . $request->hospitalLogo->extension();
        $request->hospitalLogo->move(public_path('hospital'), $hospital->hospitalLogo);
    

        if ($hospital->save()) {
            return redirect()->back()->with('success', 'Hospital Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $user = User::all();
        $city = City::all();
        $hospitaltype = HospitalType::all();
        $hospital = Hospital::find($id);
        return view('admin.hospital.edit', compact('hospital', 'city', 'hospitaltype', 'user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'hospitalName' => 'required',
            'address' => 'required',
            'cityId' => 'required',
            'contactNo' => 'required',
            'hospitalTypeId' => 'required',
            'userId' => 'required',
            'siteUrl' => 'required',
            'category' => 'required'
        ]);
        $id = $request->hospitalId;
        $hospital = Hospital::find($id);
        $hospital->hospitalName = $request->hospitalName;
        $hospital->address = $request->address;
        $hospital->cityId = $request->cityId;
        $hospital->contactNo = $request->contactNo;
        $hospital->hospitalTypeId = $request->hospitalTypeId;
        $hospital->userId = $request->userId;
        $hospital->siteUrl = $request->siteUrl;
        $hospital->category = $request->category;
        
        if($request->hospitalLogo){
            $hospitalLogo = $request->hospitalLogo;
            $hospital->hospitalLogo = time() . '.' . $request->hospitalLogo->extension();
            $request->hospitalLogo->move(public_path('hospital'), $hospital->hospitalLogo);
        }
        
        $hospital->status = "Active";

        if ($hospital->save()) {
            return redirect('admin/hospital-index')->with('success', 'Hospital Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function delete($id)
    {
        $hospital = Hospital::find($id);
        $hospital->status = "Delete";
        if ($hospital->save()) {
            return redirect('admin/hospital-index')->with('success', 'Hospital Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function viewDetails(Request $request,$id)
    {
        // $doctor = Doctor::where('hospitalId', $hospitalId)
        //     ->with('hospital')
        //     ->with('user')
        //     ->paginate(5);
        $hospital=Hospital::find($id);
        $hospitalId=$request->id;
        $doctor=Doctor::where('hospitalId',$hospitalId)
            ->with('hospital')
            ->with('user')
            ->paginate(5);
        
        $gallery = Gallery::where('hospitalId', $hospitalId)
            ->with('hospital')
            ->paginate(5);

        $facility = Facility::where('hospitalId', $hospitalId)
            ->with('hospital')
            ->paginate(5);
           
        return view('admin.hospital.viewdetails', compact('hospital','doctor','gallery','facility'));
    }
}
