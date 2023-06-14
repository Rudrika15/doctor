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
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\Specialist;
use Illuminate\Support\Facades\DB;

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
            ], 200);
        }
    }
    function blogDetails($id = 0)
    {
        if ($id > 0) {
            $blog = Blog::find($id);
        } else {
            return "not Found";
        }
        return $blog;
    }
    function blogList($id = 0)
    {
        $blogs = Blog::with('doctor')->where('id', '=', $id)->get();
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
    public function search($keyword = 0)
    {
        $blog  = Blog::where("title", "like", "%$keyword%")
            ->with('doctor')
            ->get();


        if (count($blog) > 0) {
            return response([
                'status' => 200,
                'data' => $blog,
            ]);
        } else {
            $blog  = DB::table('doctors')
                ->crossJoin('blogs')
                ->select('doctors.doctorName', 'blogs.*')
                ->where('blogs.doctorId', '=', DB::raw('doctors.id'))
                ->where('doctors.doctorName', 'like', "%$keyword%")
                ->get();
            return response([
                'status' => 200,
                'data' => $blog,
            ]);
        }
    }
    public function hospitalsearch($cityId, $keyword)
    {

        $search = Hospital::where('hospitalName', 'like', "%$keyword%")
            ->where('cityId', '=', $cityId)
            ->with('doctor')
            ->get();

        if (count($search) > 0) {
            return response([
                'status' => 200,
                'data' => $search,
            ]);
        } else {
            $search = Hospital::where('cityId', '=', $cityId)
                ->whereHas('doctor', function ($q) use ($keyword) {
                    $q->where('doctorName', 'like', "%$keyword%");
                })->with('doctor')->get();


            return response([
                'status' => 200,
                'data' => $search,
            ]);
        }
    }
}
