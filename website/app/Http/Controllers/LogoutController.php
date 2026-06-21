<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function logout(Request $request): RedirectResponse
    {

        $request->session()->invalidate();

        return redirect('/');
    }
}
