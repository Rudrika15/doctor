<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Lead;
use Illuminate\Http\Request;
use Auth;
class LeadController extends Controller
{
    public function index(){
        $userId=Auth::user()->id;
        $hospital=Hospital::where('userId','=',$userId)->first();
        $lead=Lead::with('hospital')->where('hospitalId','=',$hospital->id)->paginate(10);
        return view('hospital.lead.index',compact('lead'));
    }
}
