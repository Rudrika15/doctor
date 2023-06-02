<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminSliderController extends Controller
{
    public function index(){
        $slider=Slider::all();
        return view('admin.slider.index',compact('slider'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'place' => 'required',
            'navigate' => 'required',
            // Add more validation rules for other fields
        ]);
        $slider=new Slider();
        $slider->title=$request->title;

        $image = $request->image;
        $slider->image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin_img'), $slider->image);

        $slider->place=$request->place;
        $slider->navigate=$request->navigate;
        $slider->status="Active";

        $slider->save();

        if ($slider->save()) {
            return redirect()->back()->with('success', 'slider Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function edit($id){
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'place' => 'required',
            'navigate' => 'required'
        ]);

        $id=$request->sliderId;
        $slider=Slider::find($id);
        $slider->title=$request->title;

        if($request->image){
            
            $image = $request->image;
            $slider->image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin_img'), $slider->image);
        }

        $slider->place=$request->place;
        $slider->navigate=$request->navigate;
        $slider->status="Active";

        if ($slider->save()) {
            return redirect('admin/slider-index')->with('success', 'Slider Update successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function delete($id){
        $slider=Slider::find($id);
        $slider->status="Delete";
        if ($slider->save()) {
            return redirect()->back()->with('success', 'Slider Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
