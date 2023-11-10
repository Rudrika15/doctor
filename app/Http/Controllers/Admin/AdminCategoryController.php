<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index(Request $request){
        $categoryName=$request->categoryName;
        $status=$request->status;

        if(isset($categoryName) && isset($status)){
            $category=Category::orderBy('categoryName','ASC')
                        ->where('categoryName','like',"%$categoryName%")
                        ->where('status','like',$status)
                        ->paginate(10);
                    $count = count($category);
        }else if(isset($categoryName) && !isset($status)){
            $category=Category::orderBy('categoryName','ASC')
                        ->where('categoryName','like',"%$categoryName%")
                        ->paginate(10);
                    $count = count($category);
        }else if(!isset($categoryName) && isset($status)){
            $category=Category::orderBy('categoryName','ASC')
                        ->where('status','like',$status)
                        ->paginate(10);
                    $count = count($category);
        }else{
            $category=Category::paginate(10);
            $count = count($category);
        }
        return view('admin.category.index',compact('category','count'));

    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'categoryName'=>'required',
            'details'=>'required'
        ]);
        $category=new Category();
        $category->categoryName=$request->categoryName;
        $category->slug=$this->generateSlug($request->categoryName);
        $category->details=$request->details;
        $category->save();
        if ($category->save()) {
            return redirect()->back()->with('success', 'Category Created successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    } 
    public function Edit($slug){
        $category=Category::where('slug','=',$slug)->first();
        return view('admin.category.edit',compact('category'));
    } 
    public function update(Request $request){
        $this->validate($request,[
            'categoryName'=>'required',
            'details'=>'required'
        ]);
        $slug=$request->slug;
        $category=Category::where('slug','=',$slug)->first();
        $category->categoryName=$request->categoryName;
        $category->slug=$this->generateSlug($request->categoryName);
        $category->details=$request->details;
        $category->status="Active";
        if ($category->save()) {
            return redirect('admin/category-index')->with('success', 'Category Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function delete($id){
        $category=Category::find($id);
        $category->status="Deleted";
        if ($category->save()) {
            return redirect()->back()->with('success', 'Category Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    private function generateSlug($categoryName){
        return Str::slug($categoryName);
    }
}
