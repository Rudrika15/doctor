<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\Hospital;
use App\Models\HospitalType;

use Illuminate\Http\Request;

class AdminHospitalController extends Controller
{
    public function index(){
        $hospital=Hospital::with('hospitalType')
         ->with('city')
         ->with('user')
         ->paginate(5);
 
         return view('admin.hospital.index',compact('hospital'));
     }
     public function create(){
         $user=User::all();
         $city=City::all();
         $hospitaltype=HospitalType::all();
         return view('admin.hospital.create',compact('city','hospitaltype','user'));
     }
     public function store(Request $request){
         $this->validate($request,[
             'hospitalName'=>'required',
             'address'=>'required',
             'cityId'=>'required',
             'contactNo'=>'required',
             'hospitalTypeId'=>'required',
             'userId'=>'required',
             'siteUrl'=>'required',
             'category'=>'required'
         ]);
 
         $hospital=new Hospital();
         $hospital->hospitalName=$request->hospitalName;
         $hospital->address=$request->address;
         $hospital->cityId=$request->cityId;
         $hospital->contactNo=$request->contactNo;
         $hospital->hospitalTypeId=$request->hospitalTypeId;
         $hospital->userId=$request->userId;
         $hospital->siteUrl=$request->siteUrl;
         $hospital->category=$request->category;
         
         if($hospital->save()){
             return redirect()->back()->with('success','Hospital Added successfully!');
         }else{
             return back()->with('error','You have no permission for this page!');
         }
 
     }
     public function edit($id){
         $user=User::all();
         $city=City::all();
         $hospitaltype=HospitalType::all();
         $hospital=Hospital::find($id);
         return view('admin.hospital.edit',compact('hospital','city','hospitaltype','user'));
     }
     public function update(Request $request){
 
         $this->validate($request,[
             'hospitalName'=>'required',
             'address'=>'required',
             'cityId'=>'required',
             'contactNo'=>'required',
             'hospitalTypeId'=>'required',
             'userId'=>'required',
             'siteUrl'=>'required',
             'category'=>'required'
         ]);
         $id=$request->hospitalId;
         $hospital=Hospital::find($id);
         $hospital->hospitalName=$request->hospitalName;
         $hospital->address=$request->address;
         $hospital->cityId=$request->cityId;
         $hospital->contactNo=$request->contactNo;
         $hospital->hospitalTypeId=$request->hospitalTypeId;
         $hospital->userId=$request->userId;
         $hospital->siteUrl=$request->siteUrl;
         $hospital->category=$request->category;
         $hospital->status="Active";
         
         if($hospital->save()){
             return redirect('admin/hospital-index')->with('success','Hospital Updated successfully!');
         }else{
             return back()->with('error','You have no permission for this page!');
         }
     }
     public function delete($id){
         $hospital=Hospital::find($id);
         $hospital->status="Delete";
         if($hospital->save()){
             return redirect('admin/hospital-index')->with('success','Hospital Deleted successfully!');
         }else{
             return back()->with('error','You have no permission for this page!');
         }
     }
     public function viewDetails($id){
         $hospital=Hospital::find($id);
         return view('admin.hospital.viewdetails',compact('hospital'));
     }
 
}
