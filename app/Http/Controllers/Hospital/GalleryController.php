<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Hospital;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::paginate(5);
        return view('hospital.gallery.index', compact('gallery'));
    }

    public function create()
    {
        $hospital=Hospital::all();
        return view('hospital.gallery.create',compact('hospital'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
            'title' => 'required',
            'photo' => 'required'
        ]);

        $gallery = new Gallery();
        $gallery->hospitalId = $request->hospitalId;
        $gallery->title = $request->title;
        $photo = $request->photo;
        $gallery->photo = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('gallery'), $gallery->photo);

        if ($gallery->save()) {
            return redirect()->back()->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $hospital=Hospital::all();
        return view('hospital.gallery.edit', compact('gallery','hospital'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hospitalId' => 'required',
            'title' => 'required',
            'photo' => 'required'
        ]);

        $id = $request->Id;
        $gallery = Gallery::find($id);
        $gallery->hospitalId = $request->hospitalId;
        $gallery->title = $request->title;
        $gallery->photo = $request->photo;
        if ($request->photo) {
            $photo = $request->photo;
            $gallery->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('gallery'), $gallery->photo);
        }
        $gallery->status = "Active";
        if ($gallery->save()) {
            return redirect('hospital/gallery-index')->with('success', 'Record Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->status = "Deleted";
        if ($gallery->save()) {
            return redirect()->back()->with('success', 'Record deleted');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
