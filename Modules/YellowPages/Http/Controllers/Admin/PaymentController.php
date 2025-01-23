<?php

namespace Modules\YellowPages\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Models\UserPurchasePlan;

class PaymentController extends Controller
{
    ##------------------------- paymentHistory function ---------------------##
    public function paymentHistory(Request $request)
    {
        try {
            $query = UserPurchasePlan::with(['plan', 'user']);
    
            // Check if there's a search term for the user name
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
    
            $paymentHistories = $query->get();
    
            return view('yellowpages::Admin.payment_history', compact('paymentHistories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'An error occurred while fetching payment history: ' . $e->getMessage()]);
        }
    }
    ##------------------------- END ---------------------##

    ##------------------------- paymentHistory function ---------------------##
    public function purachsePlan(Request $request)
    {
        try {
            $query = UserPurchasePlan::with(['plan', 'user']);
    
            // Check if there's a search term for the user name
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
    
            $paymentHistories = $query->get();
        
            return view('yellowpages::Admin.purchase_plan', compact('paymentHistories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'An error occurred while fetching payment history: ' . $e->getMessage()]);
        }
    }
    
    
    ##------------------------- END ---------------------##
}
