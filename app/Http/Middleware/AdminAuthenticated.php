<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( Auth::check()) 
        {
            // if user is not admin, take him to user dashboard
            if ( Auth::user()->isAdmin()) 
            {
                return redirect(route('admin.dashboard'));
            }
            else if ( Auth::user()->isSuperAdmin())
            {
                return redirect(route('superAdmin_dashboard'));
            }
            else if ( Auth::user()->isUser())
            {
                return $next($request);
            }
        }

        abort(404); // for other user throw 404 error
    }
}
