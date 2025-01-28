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
     
         // Get all active subscriptions for the user
         $subscriptions = $user->subscriptions;
     
         if ($subscriptions->isEmpty()) {
             return redirect()->route('vCard.planDetails')->with('error', 'कृपया एक वैध सदस्यता योजना खरीदें।');
         }
     
         $activePlanTypes = [];
         
         foreach ($subscriptions as $subscription) {
             $plan = $subscription->plan;

             if (!$plan) {
                 return redirect()->route('vCard.planDetails')->with('error', 'सदस्यता योजना उपलब्ध नहीं है।');
             }
     
             // Add plan types to an array to check if user has both
             $activePlanTypes[] = $plan->type;
     
             // Check subscription limits based on each plan type
             if ($plan->type == 'येलोपेज') {
                 if ($subscription->current_visits >= $plan->visit_limit) {
                     return redirect()->route('vCard.planDetails')->with('error', 'विजिट सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
                 }
             } elseif ($plan->type == 'वीकार्ड') {
                 if ($subscription->current_qr_scan >= $plan->qr_limit) {
                     return redirect()->route('vCard.planDetails')->with('error', 'क्यूआर स्कैन सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
                 }
             } elseif ($plan->type == 'दोनों') {
                 if ($subscription->current_visits >= $plan->visit_limit || $subscription->current_qr_scans >= $plan->qr_limit) {
                     return redirect()->route('planDetails')->with('error', 'आपकी योजना की सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
                 }
             } else {
                 return redirect()->route('vCard.planDetails')->with('error', 'सदस्यता योजना सही नहीं है।');
             }
         }
     
         return $next($request);
     }
     
     
     
     
}
