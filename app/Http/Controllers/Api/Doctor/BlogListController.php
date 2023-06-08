<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Hospital;
use App\Models\HospitalType;

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
        $blogs = Blog::find($id);
        if ($blogs) {
            return response([
                'status' => 200,
                'data' => $blogs,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
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
    public function search($keyword)
    {
        
        $blog = Blog::where("title", "like", "%" . $keyword . "%")->get();
        $city = City::where("name", "like", "%" . $keyword . "%")->get();
        $doctor = Doctor::where("doctorName", "like", "%" . $keyword . "%")->get();
        $education=Education::where("education","like","%".$keyword."%")->get();
        $facilities=Facility::where("title","like","%".$keyword."%")->get();
        $gallery=Gallery::where("title","like","%".$keyword."%")->get();
        $hospital=Hospital::where("hospitalName","like","%".$keyword."%")->get();
        $hospitaltype=HospitalType::where("typeName","like","%".$keyword."%")->get();
        $response = [
            'blog' => $blog,
            'city' => $city,
            'doctor'=>$doctor,
            'education'=>$education,
            'facilities'=>$facilities,
            'gallery'=>$gallery,
            'hospital'=>$hospital,
            'hospitaltype'=>$hospitaltype,
        ];

        return $response;
    }
}
