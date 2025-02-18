<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   // app/Http/Middleware/AdminAuthenticate.php

   public function handle(Request $request, Closure $next): Response
   {
       $user = Auth::guard('admin')->user();
   
       if (!$user) {
           return redirect()->route('admin.login');
       }
   
       // Allow only admins and managers to proceed
       if ($user->role == 1 || $user->role == 3) {
           return $next($request);
       }
   
       // Redirect unauthorized users to login with an error message
       Auth::guard('admin')->logout();
       return redirect()->route('admin.login')->with('error', 'आपके पास आवश्यक अनुमतियाँ नहीं हैं');
   }
   
    
}
