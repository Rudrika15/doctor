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
            // $blog = Blog::where('status','!=','Deleted')->get();

            return "not Found";
        }
        return $blog;
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
    public function search($keyword)
    {

        $blog = Blog::where("title", "like", "%" . $keyword . "%")->get();
        if ($blog) {
            return response([
                'status' => 200,
                'data' => $blog,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }
    public function hospitalsearch(Request $request, $cityId, $keyword)
    {
        $cityId = $request->cityId;
        $keyword = $request->keyword;

        $search = Hospital::with(['city' => function ($query) use ($cityId) {
            $query->where('id', '=', $cityId);
        }])->where('hospitalName', 'like', "%$keyword%")
            ->with('doctor')->get();


        if (count($search) > 0) {
            if ($search) {
                return response([
                    'status' => 200,
                    'data' => $search,
                ]);
            } else {
                return response([
                    'message' => ['Not list found']
                ], 200);
            }
        } else {
            $search = Hospital::with(['city' => function ($query) use ($cityId) {
                $query->where('id', '=', $cityId);
            }])->with(['doctor' => function ($query) use ($keyword) {
                $query->where('doctorName', 'like', "%$keyword%");
            }])->get();

            if ($search) {
                return response([
                    'status' => 200,
                    'data' => $search,
                ]);
            } else {
                return response([
                    'message' => ['Not list found']
                ], 200);
            }
        }
    }
}


// public function search(Request $request)
// {
//     $query = $request->input('query'); // The search query from the request

//     $results = YourModel::where(function ($queryBuilder) use ($query) {
//         $queryBuilder->where('field1', 'like', "%$query%")
//             ->orWhere('field2', 'like', "%$query%")
//             ->orWhere('field3', 'like', "%$query%");
//     })->get();

//     return response()->json($results);
// }