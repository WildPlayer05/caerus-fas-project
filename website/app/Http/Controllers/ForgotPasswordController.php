<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(60);

            DB::table('password_resets')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($user) {
                $message->to($user->email)->subject('Reset Your Password');
            });

            return back()->with('status', 'Reset link sent successfully.');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }
}
