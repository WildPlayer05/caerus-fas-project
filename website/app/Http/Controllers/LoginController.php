<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegisterController;
use App\Support\Analytics\AnalyticsTracker;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $redint = session('url.intended');
        $request->session()->invalidate();

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::guard('supplier')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                if (!DB::table('suppliers')->where('email', $validatedData['email'])->value('authorized')) {
                    $request->session()->invalidate();
                    return redirect()->route('acceptance');
                }

                Auth::user();

                AnalyticsTracker::track('user_login', $validatedData['email'], [
                    'type' => 'supplier',
                    'request_id' => $request->attributes->get('request_id'),
                ]);

                return redirect()->route('supplier.overview');
        }

        $verified = DB::table('users')->where('email', $validatedData['email'])->value('email_verified_at');

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            if (!$verified) {

                $request->session()->invalidate();
                return RegisterController::otp($validatedData['email']);
            }
            Auth::user();

            AnalyticsTracker::track('user_login', $validatedData['email'], [
                'type' => 'user',
                'request_id' => $request->attributes->get('request_id'),
            ]);

            if ($redint) return redirect($redint);

            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->withInput($request->except('password'));
    }
}
