<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function registerPrivate(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email|unique:suppliers,email',
            'phoneNumber' => 'required|string|max:255|unique:users,phoneNumber',
            'CF' => 'required|string|size:16|unique:users,CF',
            'password' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with("session", "home");
        }

        $validatedData = $validator->validated();

        DB::table('users')->insert([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'ragSoc' => $validatedData['name'].' '.$validatedData['surname'],
            'email' => $validatedData['email'],
            'phoneNumber' => $validatedData['phoneNumber'],
            'CF' => $validatedData['CF'],
            'password' => bcrypt($validatedData['password']),
            'email_verified_at' => null,
        ]);

        return $this->otp($validatedData['email']);
    }

    public function registerBusiness(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'businessName' => 'required|string|max:255',
            'pIva' => 'required|digits:11|unique:users,pIva',
            'email' => 'required|email|max:255|unique:users,email|unique:suppliers,email',
            'phoneNumber' => 'required|string|max:255|unique:users,phoneNumber',
            'CF' => 'required|string|size:16|unique:users,CF',
            'password' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with("session", "business");
        }

        $validatedData = $validator->validated();

        DB::table('users')->insert([
            'ragSoc' => $validatedData['businessName'],
            'PIVA' => $validatedData['pIva'],
            'email' => $validatedData['email'],
            'phoneNumber' => $validatedData['phoneNumber'],
            'CF' => $validatedData['CF'],
            'password' => bcrypt($validatedData['password']),
            'email_verified_at' => null,
        ]);

        return $this->otp($validatedData['email']);
    }

    public function registerSupplier(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|unique:suppliers,ragSoc',
            'email' => 'required|email|max:255|unique:suppliers,email|unique:users,email',
            'iban' => 'required|string|size:27|unique:suppliers,IBAN',
            'password' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with("session", "supplier");
        }

        $validatedData = $validator->validated();

        DB::table('suppliers')->insert([
            'ragSoc' => $validatedData['name'],
            'email' => $validatedData['email'],
            'IBAN' => $validatedData['iban'],
            'password' => bcrypt($validatedData['password']),
            'authorized' => false,
        ]);

        return redirect()->route('acceptance');
    }

    public static function otp($email) {
        $code = rand(100000,999999);

        $idU = DB::table('users')->where('email', $email)->value('id');
        DB::table('OTP')->where('idU', $idU)->delete();

        DB::table('OTP')->insert([
            'idU' => $idU,
            'OTP' => $code,
        ]);

        Mail::to($email)->send(new VerificationCodeMail($code));

        return redirect()->route('signup.verify', ['id' => DB::table('OTP')->where('idU', $idU)->value('id')]);
    }

    public function verifier($id) {
        $otp = DB::table('OTP')->find($id);
        if ($otp === null) return redirect('/');

        return view('auth/verify', ['id' => $id]);
    }

    public function verify(Request $request) {
        $validatedData = $request->validate([
            'id' => 'required|string|max:255',
            'otp' => 'required|string|max:255'
        ]);

        $otp = DB::table('OTP')->find($validatedData['id']);

        if ($otp->OTP == $validatedData['otp']) {
            DB::table('users')->where('id', $otp->idU)->update(['email_verified_at' => Carbon::now()]);
            DB::table('OTP')->where('id', $validatedData['id'])->delete();

            return redirect()->route('login');
        } else {
            return back();
        }
    }
}
