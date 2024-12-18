<?php

namespace Modules\YellowPages\Http\Controllers;

use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\StripeClient;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class VCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("yellowpages::Home.vcard");
    }
    public function dashboard()
    {
        return view("yellowpages::Vcard.dashboard");
    }
    public function vCardPayment(Request $request)
    {
        $amount = 100; // Convert to cents
    try {
        // Create a new Stripe client instance
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
        // Create the checkout session
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Standard Plan',
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return response()->json(['id' => $session->id]);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function createCard(Request $request)
    {
        return view("yellowpages::Vcard.Card");
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('yellowpages::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('yellowpages::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
    
}
