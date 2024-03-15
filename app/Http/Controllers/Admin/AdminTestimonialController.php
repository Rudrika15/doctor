<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function testimonialCreate()
    {
        return view('admin.testimonial.create');
    }
    public function testimonialIndex()
    {
        $testimonial = Testimonial::paginate(10);
        return view('admin.testimonial.index', compact('testimonial'));
    }
    public function testimonialStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subTitle' => 'required',
            'details' => 'required'
           
        ]);
        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->subTitle = $request->subTitle;
        $testimonial->details = $request->details;


        if ($testimonial->save()) {
            return redirect('admin/testimonial-index')->with('success', 'Testimonial Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function testimonialEdit($id)
    {
        $testimonial =  Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }
    public function testimonialUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subTitle' => 'required',
            'details' => 'required'
           
        ]);
        $id = $request->testimonialId;
        $testimonial = Testimonial::find($id);
        $testimonial->title = $request->title;
        $testimonial->subTitle = $request->subTitle;
        $testimonial->details = $request->details;
        $testimonial->status = "Active";

        if ($testimonial->save()) {
            return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Edited successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function testimonialDelete($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->status = "Deleted";
        if ($testimonial->save()) {
            return redirect()->back()->with('success', 'Testimonial Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
}
