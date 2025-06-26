<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailOTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class VerifyOtpController extends Controller
{
    public function create()
    {
        $data['title'] = 'Forgot Password';
        return view('auth.forgot-password')->with($data);
    }

    public function sendOtpEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        try {
            $email  = $request->input('email');
            $otp    = rand(100000, 999999);

            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'Email not found']);
            }

            Mail::to($email)->send(new EmailOTPMail($otp));

            Session::put('email', $user->email);

            $user->otp = $otp;
            $user->save();

            return redirect()->route('verify.otp.page')->with(['message' => 'OTP sent successfully']);

        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    public function resendOtpEmail(Request $request)
    {
        try {
            $email  = $request->input('email');
            $otp    = rand(100000, 999999);

            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'Email not found']);
            }

            Mail::to($email)->send(new EmailOTPMail($otp));

            $user->otp = $otp;
            $user->save();

            return redirect()->back()->with(['message' => 'OTP sent successfully']);

        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function verifyOtpPage()
    {
        $data['title'] = 'Verify OTP';
        return view('auth.verify-otp')->with($data);
    }

    public function verifyOtp(Request $request)
    {

        try {
            $email  = $request->input('email');
            $otp    = $request->input('otp');

            $user   = User::where('email', $email)->where('otp', $otp)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'Invalid OTP']);
            }

            $user->otp = '0';
            $user->email_verified_at = now();
            $user->save();


            return redirect()->route('password.reset.create')->with('message', 'OTP verify successfully');
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
}
