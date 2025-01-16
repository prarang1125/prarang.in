<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckSubscriptionLimits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {
         $user = Auth::user();
         
         // Check if user is authenticated
         if (!$user) {
             return redirect()->route('login')->with('error', 'कृपया लॉगिन करें।');
         }
 
         // Check if user has an active subscription
         $subscription = $user->subscription;
         if (!$subscription) {
             return redirect()->route('vCard.planDetails')->with('error', 'कृपया एक वैध सदस्यता योजना खरीदें।');
         }
 
         // Get the plan associated with the user's active subscription
         $plan = $subscription->plan;
         if (!$plan) {
             return redirect()->route('vCard.planDetails')->with('error', 'सदस्यता योजना उपलब्ध नहीं है।');
         }
         
         // Check subscription limits based on plan type
         if ($plan->type == 'येलोपेज') {
             // YellowPages Limit Check (visit_limit)
             if ($subscription->current_visits >= $plan->visit_limit) {
                 return redirect()->route('vCard.planDetails')->with('error', 'विजिट सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
             }
         } elseif ($plan->type == 'वीकार्ड') {
             // vCard Limit Check (qr_limit)
             if ($subscription->current_qr_scan >= $plan->qr_limit) {
                 return redirect()->route('vCard.planDetails')->with('error', 'क्यूआर स्कैन सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
             }
         } elseif ($plan->type == 'दोनों') {
             // Combined YellowPages and vCard Limit Check for 'both' plans
             if ($subscription->current_visits >= $plan->visit_limit || $subscription->current_qr_scans >= $plan->qr_limit) {
                 return redirect()->route('planDetails')->with('error', 'आपकी योजना की सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
             }
         } else {
             // In case the plan type is not recognized
             return redirect()->route('vCard.planDetails')->with('error', 'सदस्यता योजना सही नहीं है।');
         }
 
         return $next($request);
     }
     
     
}
