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
         // Check if user has a subscription
         if (!$user->subscription) {
             return redirect()->route('vCard.planDetails') ->with('error', 'कृपया एक वैध सदस्यता योजना खरीदें।');
         }
 
         $subscription = $user->subscription;
         $plan = $subscription->plan;
 
         // Check visit limit
         if ($subscription->current_visits >= $plan->visit_limit) {
             return redirect()->route('vCard.planDetails')->with('error', '"विजिट सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
         }
 
         // Check QR scan limit
         if ($subscription->current_qr_scans >= $plan->qr_limit) {
             return redirect()->route('vCard.planDetails')->with('error', 'क्यूआर स्कैन सीमा पूरी हो गई है। कृपया अपनी योजना को अपग्रेड करें।');
         }
 
         return $next($request);
     }
}
