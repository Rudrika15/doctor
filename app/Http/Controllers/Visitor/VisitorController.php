<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Slider;

class VisitorController extends Controller
{
    public function index(){
       
        $doctor=Doctor::all();
        if($doctor){
            $doctorcount=count($doctor);
        }

        $hospital=Hospital::all();  
        if($hospital){
            $hospitalcount=count($hospital);
        }

        $specialist=Specialist::all();
        $specialists=$specialist;
        if($specialist){
            $specialistcount=count($specialist);
           
        }

        $slider=Slider::all();
        return view('visitor.index',compact('specialist','specialists','hospital','doctor','slider','hospitalcount','specialistcount','doctorcount'));
    }
    public function hospitalDetails(){
        return view('visitor.hospitalDetails');
    }
}
