<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Specialist;

class VisitorController extends Controller
{
    public function index(){
       
        $hospital=Hospital::all();  
        if($hospital){
            $hospitalcount=count($hospital);
        }

        $specialist=Specialist::all();
        if($specialist){
            $specialistcount=count($specialist);
        }
        return view('visitor.index',compact('hospitalcount','specialistcount'));
    }

}
