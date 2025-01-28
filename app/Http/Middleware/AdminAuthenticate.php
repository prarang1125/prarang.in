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

    // If the user is an admin, continue to the requested route
    if ($user->role == 1) {
        return $next($request); 
    }

    // If the user is a manager, redirect to manager dashboard
    if ($user->role == 3) {
        return $next($request); 
    }

    // Default check (for other roles or errors)
    return $next($request); 
}

    
}
