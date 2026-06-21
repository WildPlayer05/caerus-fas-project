<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $email = DB::table('password_resets')
            ->where('token', $token)
            ->value('email');

        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $tokenRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if ($tokenRecord) {
            $user = \App\Models\User::where('email', $request->email)->first();
            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();

                DB::table('password_resets')
                    ->where('email', $request->email)
                    ->delete();

                return redirect()->route('login')->with('status', 'Password reset successfully.');
            } else {
                return redirect()->back()->with('error', 'User not found.');
            }
        }
        return back()->withErrors(['email' => 'Invalid token or email.']);
    }
}
