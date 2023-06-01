<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminSliderController extends Controller
{
    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){

        $this->validate($request, [
            'hospitalId' => 'required',
            'title' => 'required',
            'photo' => 'required'
        ]);
        $slider=new Slider();
        $slider->title=$request->title;
        $slider->place=$request->place;
        $slider->navigate=$request->navigate;
    }
}
