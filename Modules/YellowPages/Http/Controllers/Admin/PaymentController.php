<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class PaymentController extends Controller
{
    ##------------------------- paymentHistory function ---------------------##
    public function paymentHistory()
    {
        try {
            $paymentHistories = PaymentHistory::with('plan')->get(); // Assuming 'plan' relationship exists
            return view('yellowpages::Admin.payment_history', compact('paymentHistories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'An error occurred while fetching payment history: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##
}
