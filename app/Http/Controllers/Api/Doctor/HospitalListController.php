<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalListController extends Controller
{
    public function HospitalList()
    {
        $hospitallist = Hospital::all();

        if ($hospitallist) {
            return response([
                'status' => 200,
                'data' => $hospitallist,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }
}
