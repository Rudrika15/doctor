<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityListController extends Controller
{
    function cityList()
    {
        $cityList = City::all();

        if ($cityList) {
            return response([
                'status' => 200,
                'data' => $cityList,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 404);
        }
    }
}
