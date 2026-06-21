<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showPayment(Request $request){
        $id = $request->query('contract');
        $contract = DB::table('contractType')
            ->where('id', $id)
            ->first();
        return view('users/payment-info')->with('contract', $contract);
    }
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            Charge::create([
                'amount' => 1000,
                'currency' => 'eur',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
                'automatic_tax' => [
                    'enabled' => true,
                ],
            ]);

            return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
        }
    }
}

