<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateController extends Controller
{
    public function edit(){
        // return $id=Auth::user()->id;
        
        // return view('doctor.profile.edit');
    }
    public function update(){

    }
}
