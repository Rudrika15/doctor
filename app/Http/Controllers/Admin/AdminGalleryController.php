<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Hospital;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminGalleryController extends Controller
{
    public function index(){
        $gallery=Gallery::with('hospital')->paginate(2);
        return view('admin.gallery.index',compact('gallery'));
    }
    public function create($id){
        $hospital=Hospital::find($id);
        return view('admin.gallery.create',compact('hospital'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'hospitalId'=>'required',
            'title'=>'required',
            'photo'=>'required'
        ]);

        $gallery=new Gallery();
        $gallery->hospitalId=$request->hospitalId;
        $gallery->title=$request->title;
        $photo=$request->photo;
        $gallery->photo=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('admin_img'),$gallery->photo);
       
        $gallery->save();

        if($gallery->save()){
            return redirect()->back()->with('success','Gallery Added successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function edit($id){
        $gallery=Gallery::find($id);
        return view('admin.gallery.edit',compact('gallery'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'hospitalId'=>'required',
            'title'=>'required',
        ]);
        $id=$request->galleryId;
        $gallery=Gallery::find($id);
        $gallery->hospitalId=$request->hospitalId;
        $gallery->title=$request->title;
        if ($request->photo) {
            $photo = $request->photo;
            $gallery->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('admin_img'), $gallery->photo);
        }
        $gallery->status="Active";
        $gallery->save();

        if($gallery->save()){
            return redirect('admin/gallery-index')->with('success','Gallery Updated successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function delete($id){
        $gallery=Gallery::find($id);
        $gallery->status="Delete";
        if($gallery->save()){
            return redirect()->back()->with('success','Gallery Deleted successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
}
