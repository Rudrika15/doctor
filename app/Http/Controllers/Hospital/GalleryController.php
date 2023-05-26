<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create(){
        return view('hospital.gallery.create');
    }
    public function store(Request $request){
        $request->validate([
            '$hospitalId'=>'required',
            '$title'=>'required',
            'photo'=>'required'
        ]);

        $gallery=New Gallery();
        $gallery->hospitalId=$request->hospitalId;
        $gallery->title=$request->title;
        $gallery->photo=$request->photo;

    }
}
