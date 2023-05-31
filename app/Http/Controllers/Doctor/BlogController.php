<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Doctor;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blog=Blog::paginate(5);
        return view('doctor.blog.index',compact('blog'));
    }
    public function create()
    {
        $doctor=Doctor::all();
        return view('doctor.blog.create',\compact('doctor'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'photo' => 'required',
            'doctorId' => 'required'

        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->detail = $request->detail;
        $photo = $request->photo;
        $blog->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('photo'), $blog->photo);
        $blog->doctorId = $request->doctorId;
        if ($blog->save()) {

            return redirect()->back()->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
