<?php

namespace App\Http\Controllers\Api\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Facility;
use App\Models\Hospital;
use App\Models\Gallery;
use App\Models\HospitalType;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    function hospitalView()
    {
        $hospital = HospitalType::all();

        if ($hospital) {
            return response([
                'status' => 200,
                'data' => $hospital,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }

    function gallery($id = 0)
    {
        $gallery = Gallery::where('hospitalId', '=', $id)->get();

        if (count($gallery) > 0) {
            return response([
                'status' => 200,
                'data' => $gallery,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }
    function singlehospital($id = 0)
    {
        $hospital = Hospital::find($id);
        if ($hospital) {
                         return response([
                        'status' => 200,
                        'data' => $hospital,
                         ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);  
        }
    }
   
    
    function doctor($id = 0)
    {
        $doctor = Doctor::where('hospitalId', '=', $id)->get();

        if (count($doctor) > 0) {
            return response([
                'status' => 200,
                'data' => $doctor,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }

    function facility($id = 0)
    {
        $facility = Facility::where('hospitalId', '=', $id)->get();

        if (count($facility) > 0) {
            return response([
                'status' => 200,
                'data' => $facility,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }

    function socialLink($id = 0)
    {
        $sociallink = socialLink::where('hospitalId', '=', $id)->get();

        if (count($sociallink) > 0) {
            return response([
                'status' => 200,
                'data' => $sociallink,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }
    function hospitaltype($id = 0)
    {
        $hospitaltype = HospitalType::find($id);
        if ($hospitaltype) {
            return response([
                'status' => 200,
                'data' => $hospitaltype,
            ]);
        }  else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }
    
   
    function hospitaltypeview($id = 0)
    {
        if ($id > 0) {
            $hospital = HospitalType::with('hospital')
                ->where('id', '=', $id)
                ->get();
            return $hospital;
        } else {
            return response([
                'message' => 'Not list found'
            ], 200);
        }
    }
}
