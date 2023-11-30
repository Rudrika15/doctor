<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function sendOtp(Request $request) {
        $user = auth()->user();
        $otp = rand(1000, 9999);
        $user->update(['otp' => $otp]);
    
        Mail::to($user->email)->send(new SendOtpMail($otp));
    
        return redirect()->back()->with('success', 'OTP sent to your email.');
    }
    
    public function verifyOtp(Request $request) {
        $user = auth()->user();
        if ($request->otp == $user->otp) {
            $user->update(['otp' => null]);
    
            return redirect()->route('dashboard')->with('success', 'OTP verified successfully.');
        } else {
            return back()->with('error', 'Invalid OTP. Please try again.');
        }
    }
}
