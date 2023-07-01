<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\SocialLink;

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
    public function hospitalDetails(Request $request){
        $hospitalId=$request->id;
        $hospital=Hospital::where('id','=',$hospitalId)->get();

        $specialist=Specialist::all();
        $doctor=Doctor::where('hospitalId','=',$hospitalId)->get();

        $gallery=Gallery::where('hospitalId','=',$hospitalId)->get();

        $facility=Facility::where('hospitalId','=',$hospitalId)->get(); 

        $sociallink=SocialLink::where('hospitalId','=',$hospitalId)->get();
        return view('visitor.hospitalDetails',compact('hospital','doctor','specialist','gallery','facility','sociallink'));
    }
}
