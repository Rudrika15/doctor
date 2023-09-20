<?php

namespace App\Http\Controllers;

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
            return view('home');
        }elseif(Auth::user()->hasRole('User')){
            return redirect('/');
        }elseif(Auth::user()->hasRole('Hospital')){
            return view('/home');
        }elseif(Auth::user()->hasRole('Doctor')){
            return view('/home');
        }else{
            return redirect('/');
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
