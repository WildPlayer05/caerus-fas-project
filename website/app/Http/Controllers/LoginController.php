<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegisterController;

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
                return redirect()->route('supplier.overview');
        }

        $verified = DB::table('users')->where('email', $validatedData['email'])->value('email_verified_at');

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            if (!$verified) {

                $request->session()->invalidate();
                return RegisterController::otp($validatedData['email']);
            }
            Auth::user();

            if ($redint) return redirect($redint);

            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->withInput($request->except('password'));
    }
}
