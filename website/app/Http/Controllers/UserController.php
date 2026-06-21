<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = DB::table('users')
        ->select('name', 'surname', 'email')
        ->where('id', $request->session()->get('id'))
        ->first();
        return view('users/profile.index', ['profile' => $user]);
    }

    public function update(Request $request, $id)
    {
        if ($request->has('password')) {
            $request->validate([
                'password' => 'required|string|min:8',
            ]);

            $user = DB::table('users')->where('id', $id)->first();

            if (!Hash::check($request->input('oldpassword'), $user->password)) {
                return  redirect()->route('profile.index');
            }

            DB::table('users')->where('id', $id)->update([
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('profile.index');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$id.'|unique:suppliers,email,'.$id
            ]);

            DB::table('users')->where('id', $id)->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'ragSoc' => $request->input('name')." ".$request->input('surname'),
                'email' => $request->input('email'),
            ]);

            return redirect()->route('profile.index');
        }
    }


}
