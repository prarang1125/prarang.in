<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class PaymentController extends Controller
{
    public function paymentHistory()
    {
        $paymentHistories = PaymentHistory::with('plan')->get(); // Assuming 'plan' relationship exists
        return view('yellowpages::Admin.payment_history', compact('paymentHistories'));
    }
}
