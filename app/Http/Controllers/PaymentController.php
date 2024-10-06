<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkoutView($token)
    {
        return view('checkout', ['token' => $token]);
    }

    public function createIntent(Request $request)
    {        
        $data = $request->validate([
            'amount' => ['required', 'numeric']
        ]);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // Use actual customer Info
        $customer = $stripe->customers->create([
            'name' => 'Jenny Rosen',
            'email' => 'jennyrosen@example.com',
            'address' => [
                'city' => 'Kolkata',
                'country' => 'India',
                'state' => 'West Bengal',
                'line1' => 'Salt Lake',
                'postal_code' => '746363'
            ]
        ]);

        // Create payment intent
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $data['amount'] * 1000,
            'currency' => 'usd',
            'customer' => $customer->id,
            'description' => 'tshirt sold',
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return redirect()->route(
            'checkout.index',
            ['token' => $paymentIntent->client_secret]
        );
    }
}
