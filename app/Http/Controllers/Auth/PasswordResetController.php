<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function create()
    {
        $data['title'] = __('Reset Password');
        return view('auth.reset-password')->with($data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'new_password'  => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'We can\'t find a user with that e-mail address.']);
        }

        $newPassword = Hash::make($request->new_password);

        $user->update(['password' => $newPassword]);

        session()->forget('email');

        return redirect()->route('login')->with('message', 'Your password has been changed.');
    }
}
