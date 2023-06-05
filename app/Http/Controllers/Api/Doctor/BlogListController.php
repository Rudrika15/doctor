<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Gallery;

class BlogListController extends Controller
{
   
    function blogView()
    {
        $blogview = Blog::all();

        if ($blogview) {
            return response([
                'status' => 200,
                'data' => $blogview,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }
    function blogList($id = 0)
    {
        if ($id > 0) {
            $blog = Blog::find($id);
        } else {
            // $blog = Blog::where('status','!=','Deleted')->get();

            return "not Found";
        }
        return $blog;
    }
    function blogDetails($id = 0)
    {
        if ($id > 0) {
            $blog = Blog::find($id);
        } else {
            // $blog = Blog::where('status','!=','Deleted')->get();

            return "not Found";
        }
        return $blog;
    }
    public function search($title)
    {
        return Blog::where("title",$title)->get();
        // $results = Blog::table('blogs')
        //     ->where('title', 'like', '%' . $query . '%')
        //     ->orWhere('content', 'like', '%' . $query . '%')
        //     ->get();

        // return response()->json($results);
    }
}
