<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $user=Auth::user()->id;
        $doctorId=Doctor::where('userId','=',$user)->first();
        $blog = Blog::where('doctorId','=',$doctorId->id)->paginate(5);
        return view('doctor.blog.index', compact('blog'));
    }
    public function create()
    {
        $doctor = Doctor::all();
        return view('doctor.blog.create', compact('doctor'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'photo' => 'required',
        ]);
        $user = Auth::user()->id;
        $doctorId=Doctor::where('userId','=',$user)->first();
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->detail = $request->detail;
        $photo = $request->photo;
        $blog->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('blog'), $blog->photo);
        $blog->doctorId = $doctorId->id;
        if ($blog->save()) {

            return redirect()->back()->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        $doctor = Doctor::all();
        return view('doctor.blog.edit', compact('blog', 'doctor'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);
        $user = Auth::user()->id;
        $doctorId=Doctor::where('userId','=',$user)->first();
        $id = $request->id;
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->detail = $request->detail;
        if ($request->photo) {
            $photo = $request->photo;
            $blog->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('blog'), $blog->photo);
        }
        $blog->doctorId = $doctorId->id;
        $blog->status = "Active";
        if ($blog->save()) {
            return redirect('doctor/blog-index')->with('success', 'record updated successfully');
        } else {
            return back()->with('error', 'you have no permission');
        }
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->status = "Deleted";
        if ($blog->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
