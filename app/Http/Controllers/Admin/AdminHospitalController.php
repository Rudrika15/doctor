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
use App\Models\SocialLink;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminHospitalController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:hospital-list|hospital-create|hospital-edit|hospital-delete|hospital-viewdetails', ['only' => ['index', 'store']]);
    //      $this->middleware('permission:hospital-create', ['only' => ['create', 'store']]);
    //      $this->middleware('permission:hospital-edit', ['only' => ['edit', 'update']]);
    //      $this->middleware('permission:hospital-delete', ['only' => ['delete']]);
    //      $this->middleware('permission:hospital-viewdetails', ['only' => ['viewDetails']]);
    // }

    public function index(Request $request)
    {
        $city = City::all();
        $hospitaltype = HospitalType::all();
        $user = User::all();

        $hospitalName = $request->hospitalName;
        $cityId = $request->cityId;
        $hospitalTypeId = $request->hospitalTypeId;
        $category = $request->category;
        $status = $request->status;
        //For all inputs
        if (isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('cityId', '=', $cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        } 
        //For Only Hospital Name
        else if (isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital name and City 
        else if (isset($hospitalName) && isset($cityId) && !isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('cityId','=',$cityId)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital name and Hospital type
        else if (isset($hospitalName) && isset($hospitalTypeId) && !isset($cityId)  && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital name and category
        else if (isset($hospitalName) && isset($category) && !isset($cityId) && !isset($hospitalTypeId)  && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hoapital name and status
        else if (isset($hospitalName) && isset($status) && !isset($cityId) && !isset($hospitalTypeId) && !isset($category) ) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital city and hospital type
        else if (isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('cityId','=',$cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital, city, hospital type and category
        else if (isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName', 'like',"%$hospitalName%")
                ->where('cityId','=',$cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        }
        //Only for city
        else if (!isset($hospitalName) && isset($cityId) && !isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->paginate(20);
                $count = count($hospital);
        } 
        //For City and Hospital type
        else if (!isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->paginate(20);
                $count = count($hospital);
        } 
        //For City and category
        else if (!isset($hospitalName) && isset($cityId) && !isset($hospitalTypeId) && isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        }
        //For City and status 
        else if (!isset($hospitalName) && isset($cityId) && !isset($hospitalTypeId) && !isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        }
        //For City , Hospital type and Category 
        else if (!isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        }
        //For City , Hospital type , category and status
        else if (!isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId', '=', $cityId)
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        }
        //Only For Hospital Type
        else if (!isset($hospitalName) && !isset($cityId) && isset($hospitalTypeId) && !isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital type and category
        else if (!isset($hospitalName) && !isset($cityId) && isset($hospitalTypeId) && isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        } 
        //For Hospital Type and status
        else if (!isset($hospitalName) && !isset($cityId) && isset($hospitalTypeId) && !isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        }
        //For Hospital type , category and status
        else if (!isset($hospitalName) && !isset($cityId) && isset($hospitalTypeId) && isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalTypeId', '=', $hospitalTypeId)
                ->where('category', '=', $category)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        }
        //Only for Category
        else if (!isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && isset($category) && !isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('category', '=', $category)
                ->paginate(20);
                $count = count($hospital);
        } 
        //For Category and status
        else if (!isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('category', '=', $category)
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        } 
        //Only For Status
        else if (!isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && !isset($category) && isset($status)) {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->where('status', '=', $status)
                ->paginate(20);
                $count = count($hospital);
        } 
        else {
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
                ->with('hospitalType')
                ->with('city')
                ->with('user')
                ->paginate(20);
                $count = count($hospital);
        }
        return view('admin.hospital.index', compact('hospital', 'city', 'hospitaltype', 'user','count'));
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
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'cityId' => 'required',
            'contactNo' => 'required',
            'hospitalTypeId' => 'required',
            'userId' => 'required',
            'siteUrl' => 'required',
            'category' => 'required',
            'hospitalLogo' => 'required',
            'hospitalTime' => 'required',
            'services' => 'required'
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

        $hospital->hospitalTime = $request->hospitalTime;
        $hospital->services = $request->services;

        $hospital->save();

        $user=new User();
        $user->name=$request->hospitalName;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->contactNumber=$request->contactNo;
        $user->assignRole('Hospital');
        $user->save();
        if ($hospital) {
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
            'category' => 'required',
            'hospitalTime' => 'required',
            'services' => 'required'
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

        if ($request->hospitalLogo) {
            $hospitalLogo = $request->hospitalLogo;
            $hospital->hospitalLogo = time() . '.' . $request->hospitalLogo->extension();
            $request->hospitalLogo->move(public_path('hospital'), $hospital->hospitalLogo);
        }

        $hospital->hospitalTime = $request->hospitalTime;
        $hospital->services = $request->services;
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

    public function viewDetails(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        $hospitalId = $request->id;

    //For Doctor
        $specialist = Specialist::all();
        $doctorName = $request->doctorName;
        $specialistId = $request->specialistId;

        $status = $request->status;
        //For All docotor data
        if (isset($doctorName) && isset($specialistId) && isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('doctorName', 'like',"%$doctorName%")
                ->where('specialistId', '=', $specialistId)
                ->where('status', '=', $status)
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //Only for doctor 
        else if (isset($doctorName) && !isset($specialistId) && !isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                 ->where('hospitalId', $hospitalId)
                ->where('doctorName', 'like', "%$doctorName%")
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //For Doctor and specialist
        else if (isset($doctorName) && isset($specialistId) && !isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('doctorName', 'like',"%$doctorName%")
                ->where('specialistId', $specialistId)
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //For Doctor and status
        else if (isset($doctorName) && !isset($specialistId) &&  isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('doctorName', 'like', "%$doctorName%")
                ->where('status', '=', $status)
                ->paginate(20);
                $doctorcount = count($doctor);
        } 
        //Only For Specialitst
        else if (!isset($doctorName) && isset($specialistId) && !isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('specialist')
                ->where('specialistId', $specialistId)
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //For Specialist and status
        else if (!isset($doctorName) && isset($specialistId) && isset($status)) {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('specialist')
                ->where('specialistId', $specialistId)
                ->where('status', '=', $status)
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //Only for status 
        else if (!isset($doctorName) && !isset($specialistId) &&  isset($status)) {

            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('status', '=', $status)
                ->paginate(20);
                $doctorcount = count($doctor);
        } 
        else {
            $doctor = Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('hospital')
                ->with('user')
                ->paginate(20);
                $doctorcount = count($doctor);
        }
        //-------------------------------------------------------------------------

        //For Gallery

        $title = $request->title;
        $status = $request->status;

        if (isset($title) && isset($status)) {
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('title', 'like', "%$title%")
                ->where('status', '=', $status)
                ->paginate(20);
            $gallerycount = count($gallery);
        }
        else if (isset($title) && !isset($status)) {
            $gallery = Gallery::orderBy('title', 'ASC')
            ->where('hospitalId', $hospitalId)    
            ->where('title', 'like', "%$title%")
                ->paginate(20);
            $gallerycount = count($gallery);
        } 
        else if (!isset($title) && isset($status)) {
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('status', '=', $status)
                ->paginate(20);
            $gallerycount = count($gallery);
        } 
        else {
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('hospital')
                ->paginate(20);
            $gallerycount = count($gallery);
        }

    //For Facility

        $facilityTitle = $request->title;
        $facilityStatus = $request->status;
        if (isset($facilityTitle) && isset($facilityStatus)) {
            $facility = Facility::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)    
                ->where('title', 'like', "%$facilityTitle%")
                ->where('status', '=', $facilityStatus)
                ->paginate(20);
            $facilitycount = count($facility);
        } 
        else  if (isset($facilityTitle) && !isset($facilityStatus)) {
            $facility = Facility::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('title', 'like', "%$facilityTitle%")
                ->paginate(20);
            $facilitycount = count($facility);
        } 
        else if (!isset($facilityTitle) && isset($facilityStatus)) {
            $facility = Facility::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->where('status', '=', $facilityStatus)
                ->paginate(20);
            $facilitycount = count($facility);
        } else {
            $facility = Facility::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('hospital')
                ->paginate(20);
            $facilitycount = count($facility);
        }

        //For Social Link.
        $socialtitle=$request->title;
        $socialstatus=$request->status;

        //For both input data
        if(isset($socialtitle) && isset($socialstatus)){
            $sociallink = SocialLink::orderBy('title','ASC')
                        ->where('hospitalId', $hospitalId)
                        ->where('title','like',"%$socialtitle%")
                        ->where('status','=',$socialstatus)
                        ->paginate(20);
                        $socialcount=count($sociallink);  
        }
        //For Only Social Title
        else if(isset($socialtitle) && !isset($socialstatus)){
            $sociallink = SocialLink::orderBy('title','ASC')
                        ->where('hospitalId', $hospitalId)
                        ->where('title','like',"%$socialtitle%")
                        ->paginate(20);
                        $socialcount=count($sociallink);  
        }
        //For Only Social status
        else if(!isset($socialtitle) && isset($socialstatus)){
            $sociallink = SocialLink::orderBy('title','ASC')
                        ->where('hospitalId', $hospitalId)
                        ->where('status','=',$socialstatus)
                        ->paginate(20);
                        $socialcount=count($sociallink);  
        }
        else{
            $sociallink = SocialLink::where('hospitalId', $hospitalId)
            ->with('hospital')
            ->paginate(20);
            $socialcount=count($sociallink);  
        }
        
        return view('admin.hospital.viewdetails', compact('hospital', 'doctor', 'gallery', 'facility', 'specialist', 'gallerycount', 'facilitycount', 'sociallink','doctorcount','socialcount'));
    }
}
