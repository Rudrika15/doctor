<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
       // $hospital=Hospital::join('cities','cities.id','=','hospitals.cityId')
                    //->get([hospi]);
        $hospital=Hospital::paginate(5);
        return view('admin.hospital.index',compact('hospital'));
    }
    public function create(){
        $city=City::all();
        return view('admin.hospital.create',compact('city'));
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
        $city=City::all();
        $hospital=Hospital::find($id);
        return view('admin.hospital.edit',compact('hospital','city'));
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
}
