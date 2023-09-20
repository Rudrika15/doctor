<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AdminSocialLinkController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:sociallink-list|sociallink-create|sociallink-edit|sociallink-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:sociallink-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:sociallink-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:sociallink-delete', ['only' => ['delete']]);
    // }

    public function index(){
        $sociallink=SocialLink::all();
        return view('admin.sociallink.index',compact('sociallink'));
    }
    public function create(){
        return view('admin.sociallink.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'link'=>'required',
            'hospitalId'=>'required'
        ]);

        $sociallink=new SocialLink();
        $sociallink->title=$request->title;
        $sociallink->link=$request->link;
        $sociallink->hospitalId=$request->hospitalId;

        if($sociallink->save()){
            return redirect()->back()->with('success','SocialLink Added Successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function edit($id){
        $sociallink=SocialLink::find($id);
        Return view('admin.sociallink.edit',compact('sociallink'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'hospitalId'=>'required',
            'title'=>'required',
            'link'=>'required'
            
        ]);

        $hospital=$request->hospitalId;
        $id=$request->socialId;
        $sociallink=SocialLink::find($id);
        $sociallink->hospitalId=$request->hospitalId;
        $sociallink->title=$request->title;
        $sociallink->link=$request->link;

        if($sociallink->save()){
            return redirect()->route('admin.hospital.viewdetails', $hospital)->with('success', 'Social Link Updated successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
    public function delete($id){
        $sociallink=SocialLink::find($id);
        $sociallink->status="Delete";
        if($sociallink->save()){
            return redirect()->back()->with('success', 'Social Link Deleted successfully!');
        }else{
            return back()->with('error','You have no permission for this page!');
        }
    }
}
