<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function specialistList()
    {
        $specialist = Specialist::all();

        if ($specialist) {
            return response([
                'status' => 200,
                'data' => $specialist,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }
}
