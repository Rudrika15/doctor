<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Hospital;
use App\Models\HospitalType;
use App\Models\Lead;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\Specialist;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $slider=Slider::where('status','=','Active')->get();
            $slidercount=count($slider);

            $hospital=Hospital::where('status','=','Active')->get();
            $hospitalcount=count($hospital);

            $city=City::where('status','=','Active')->get();
            $citycount=count($city);

            $state=State::where('status','=','Active')->get();
            $statecount=count($state);

            $hospitalType=HospitalType::where('status','=','Active')->get();
            $hospitalTypecount=count($hospitalType);

            $specialist=Specialist::where('status','=','Active')->get();
            $specialistcount=count($specialist);

            $doctor=Doctor::where('status','=','Active')->get();
            $doctorcount=count($doctor);

            $lead=Lead::all();
            $leadcount=count($lead);

            $category=Category::all();
            $categorycount=count($category);

            $gallery=Gallery::where('status','=','Active')->get();
            $gallerycount=count($gallery);

            $facility=Facility::where('status','=','Active')->get();
            $facilitycount=count($facility);

            $socialLink=SocialLink::where('status','=','Active')->get();
            $socialLinkcount=count($socialLink);

            $user=User::all();
            $usercount=count($user);

            $role=Role::all();
            $rolecount=count($role);

            return view('home',compact('slidercount','hospitalcount','citycount',
                            'statecount','hospitalTypecount','specialistcount',
                            'doctorcount','gallerycount','facilitycount',
                            'socialLinkcount','usercount','rolecount',
                            'leadcount','categorycount'));
        }elseif(Auth::user()->hasRole('User')){
            return redirect('/');
        }elseif(Auth::user()->hasRole('Hospital')){
            $userId=Auth::user()->id;
    
            $doctor=Doctor::where('hospitalId','=',$userId)->get();
            $doctorcount=count($doctor);

            $hospital=Hospital::where('userId','=',$userId)->first();

            $lead=Lead::where('hospitalId','=',$hospital->id)->get();
            $leadcount=count($lead);

            $gallery=Gallery::where('hospitalId',$hospital->id)->get();
            $gallerycount=count($gallery);

            $facility=Facility::where('hospitalId',$hospital->id)->get();
            $facilitycount=count($facility);

            $socialLink=SocialLink::where('hospitalId',$hospital->id)->get();
            $socialLinkcount=count($socialLink);

            $appointment=Appointment::where('hospitalId',$hospital->id)->get();
            $appointmentcount=count($appointment);

            $schedule=Schedule::where('hospitalId',$hospital->id)->get();
            $schedulecount=count($schedule);

            return view('/home',compact('doctorcount','gallerycount',
                                'facilitycount','socialLinkcount',
                                'appointmentcount','schedulecount','leadcount'));
        }elseif(Auth::user()->hasRole('Doctor')){
            $user=Auth::user()->id;
            $doctor=Doctor::where('userId','=',$user)->first();
            
            $blog=Blog::where('doctorId','=',$doctor->id)->get();
            $blogcount=count($blog);

            $education=Education::where('doctorId','=',$doctor->id)->get();
            $educationcount=count($education);

            return view('/home',compact('blogcount','educationcount'));
        }else{
            $city=City::all();
            return redirect('/',compact('city'));
        }
        // $userId = Auth::user()->role="Admin";
        // if($userId)
        // {
        //     return view('home');
        // }
        // else{
        //     return view('visitor.index');
        // }

    //    return view('home');
        
    }
}
