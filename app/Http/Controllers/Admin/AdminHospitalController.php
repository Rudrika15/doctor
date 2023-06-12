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

class AdminHospitalController extends Controller
{
    public function index(Request $request)
    {
        $city = City::all();
        $hospitaltype = HospitalType::all();
        $user=User::all();

        $hospitalName = $request->hospitalName;
        $cityId = $request->cityId;
        $hospitalTypeId = $request->hospitalTypeId;
        $category = $request->category;
        $status=$request->status;
       
        if(isset($hospitalName) && isset($cityId) && isset($hospitalTypeId) && isset($category) && isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName','=',$hospitalName)
                ->where('cityId','=',$cityId)
                ->where('hospitalTypeId','=',$hospitalTypeId)
                ->where('category','=',$category)
                ->where('status','=',$status)
                ->paginate(5);
        }
        else if(isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && !isset($category) && !isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalName','=',$hospitalName)
                ->paginate(5);
        }
        else if(!isset($hospitalName) && isset($cityId) && !isset($hospitalTypeId) && !isset($category) && !isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
                ->where('cityId','=',$cityId)
            ->paginate(5);
        }
        else if(!isset($hospitalName) && !isset($cityId) && isset($hospitalTypeId) && !isset($category) && !isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
                ->where('hospitalTypeId','=',$hospitalTypeId)
            ->paginate(5);
        }
        else if(!isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && isset($category) && !isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
                ->where('category','=',$category)
            ->paginate(5);
        }
        else if(!isset($hospitalName) && !isset($cityId) && !isset($hospitalTypeId) && !isset($category) && isset($status)){
            $hospital=Hospital::orderBy('hospitalName', 'ASC')
            ->where('status','=',$status)
            ->paginate(5);
        }
        else{
            $hospital = Hospital::orderBy('hospitalName', 'ASC')
            ->with('hospitalType')
            ->with('city')
            ->with('user')
            ->paginate(5);
        }
        return view('admin.hospital.index', compact('hospital','city','hospitaltype','user'));
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
            'hospitalLogo'=>'required',
            'hospitalTime'=>'required',
            'services'=>'required'
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
    
        $hospital->hospitalTime=$request->hospitalTime;
        $hospital->services=$request->services;

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
            'category' => 'required',
            'hospitalTime'=>'required',
            'services'=>'required'
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
        
        $hospital->hospitalTime=$request->hospitalTime;
        $hospital->services=$request->services;
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
        $hospital=Hospital::find($id);
        $hospitalId=$request->id;

//For Doctor
        $specialist=Specialist::all();
        $doctorName=$request->doctorName;
        $specialistId=$request->specialistId;
        
        $status=$request->status;
        if(isset($doctorName) && isset($specialistId) && isset($registerNumber) && isset($status)){
           
            $doctor=Doctor::orderBy('doctorName', 'ASC')
                ->where('doctorName','=',$doctorName)
                ->where('specialistId','=',$specialistId)
                ->where('status','=',$status)
                ->paginate(5);
        }
        else if(isset($doctorName) && !isset($specialistId) && !isset($status)){
           
           $doctor=Doctor::orderBy('doctorName', 'ASC')
           ->where('doctorName','=',$doctorName)
           ->paginate(5);
        }
        else if(!isset($doctorName) && isset($specialistId) && !isset($status)){
            
            
            $doctor=Doctor::orderBy('doctorName', 'ASC')
                ->with('specialist')
                ->where('specialistId',$specialistId)
                ->paginate(5);
        }
        
        else if(!isset($doctorName) && !isset($specialistId) &&  isset($status)){
           
            $doctor=Doctor::orderBy('doctorName', 'ASC')
                ->where('status','=',$status)
                ->paginate(5);
        }
        else{
           
            $doctor=Doctor::orderBy('doctorName', 'ASC')
                ->where('hospitalId',$hospitalId)
                ->with('hospital')
                ->with('user')
                ->paginate(5);
        }
//-------------------------------------------------------------------------

//For Gallery

        $title=$request->title;
        $status=$request->status;

        if(isset($title) && isset($status)){
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('title','=',$title)
                ->where('status','=',$status)
                ->paginate(5);
                $gallerycount=count($gallery);  
        }
        else if(isset($title) && !isset($status)){
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('title','=',$title)
                ->paginate(5);
                $gallerycount=count($gallery);  
        }
        else if(!isset($title) && isset($status)){
            $gallery = Gallery::orderBy('title', 'ASC')
                ->where('status','=',$status)
                ->paginate(5);
                $gallerycount=count($gallery);  
        }
        else{
            $gallery = Gallery::orderBy('title', 'ASC')
            ->where('hospitalId', $hospitalId)
            ->with('hospital')
            ->paginate(5);
            $gallerycount=count($gallery);
        }

//For Facility
        $facilityTitle=$request->title;
        $facilityStatus=$request->status;
        if(isset($facilityTitle) && isset($facilityStatus)){
            $facility=Facility::orderBy('title', 'ASC')
                ->where('title','=',$facilityTitle)
                ->where('status','=',$facilityStatus)
                ->paginate(5);
                $facilitycount=count($facility);
        }
        else  if(isset($facilityTitle) && !isset($facilityStatus)){
            $facility=Facility::orderBy('title', 'ASC')
             ->where('title','=',$facilityTitle)
                ->paginate(5);
                $facilitycount=count($facility);
        } 
        else if(!isset($facilityTitle) && isset($facilityStatus)){
            $facility=Facility::orderBy('title', 'ASC')
                ->where('status','=',$facilityStatus)
                ->paginate(5);
                $facilitycount=count($facility);
        }
        else{
            $facility = Facility::orderBy('title', 'ASC')
                ->where('hospitalId', $hospitalId)
                ->with('hospital')
                ->paginate(5);
                $facilitycount=count($facility);
        }  
        
//For Social Link.
        $sociallink=SocialLink::where('hospitalId',$hospitalId)
            ->with('hospital')
            ->paginate(5);
        return view('admin.hospital.viewdetails', compact('hospital','doctor','gallery','facility','specialist','gallerycount','facilitycount','sociallink'));
    }
}
