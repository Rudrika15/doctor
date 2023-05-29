<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
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
        return view('hospital.gallery.create');
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
        $request->photo->move(public_path('photo'), $gallery->photo);

        if ($gallery->save()) {
            return redirect()->back()->with('success', 'Record Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('hospital.gallery.edit', compact('gallery'));
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
            $request->photo->move(public_path('photo'), $gallery->photo);
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
            return redirect('hospital/gallery-index')->with('success', 'Record Deleted!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
