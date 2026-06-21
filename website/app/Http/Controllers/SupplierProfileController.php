<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class SupplierProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::table('suppliers')
        ->select('ragSoc', 'IBAN', 'email')
        ->where('id', Auth::user()->id)
        ->first();
        return view('suppliers/profile', ['profile' => $user]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        if ($request->has('password')) {
            $request->validate([
                'password' => 'required|string|min:8',
            ]);

            $user = DB::table('suppliers')->where('id', $id)->first();

            if (!Hash::check($request->input('oldpassword'), $user->password)) {
                return  redirect()->route('supplier.profile');
            }

            DB::table('suppliers')->where('id', $id)->update([
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('profile.index');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'IBAN' => 'required|string|size:27',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id.'|unique:suppliers,email,'.$id
            ]);

            DB::table('suppliers')->where('id', $id)->update([
                'ragSoc' => $request->input('name'),
                'IBAN' => $request->input('IBAN'),
                'email' => $request->input('email')
            ]);

            return redirect()->route('supplier.profile');
        }
    }
}