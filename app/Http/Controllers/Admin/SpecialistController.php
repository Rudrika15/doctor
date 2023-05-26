<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class SpecialistController extends Controller
{
    public function index(){
        $specialist=Specialist::paginate(5);
        return view('admin.specialist.index',compact('specialist'));
    }
    public function create(){
        return view('admin.specialist.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'specialistName'=>'required'
        ]);
        $specialist=new Specialist();
        $specialist->specialistName=$request->specialistName;
        $specialist->save();
        
        if($specialist->save()){
            return redirect()->back()->with('success','Specialist Added successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');

        }
    }
    public function edit($id){
        $specialist=Specialist::find($id);
        return view('admin.specialist.edit',compact('specialist'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'specialistName'=>'required'
        ]);
        $id=$request->specialistId;
        $specialist=Specialist::find($id);
        $specialist->specialistName=$request->specialistName;
        $specialist->status="Active";
        
        if($specialist->save()){
            return redirect('admin/specialist-index')->with('Success!','Specialist Update successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');

        }
    }
    public function delete($id){
        $specialist=Specialist::find($id);
        $specialist->status="Delete";
        $specialist->save();
        if($specialist->save()){
            return redirect()->back()->with('Success','Specialist Deleted successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
}
