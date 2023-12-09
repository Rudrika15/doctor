<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function slider()
    {
        $sliderView = Slider::paginate(1);

        if ($sliderView) {
            return response([
                'status' => 200,
                'data' => $sliderView,
            ]);
        } else {
            return response([
                'message' => ['Not list found']
            ], 200);
        }
    }
}
