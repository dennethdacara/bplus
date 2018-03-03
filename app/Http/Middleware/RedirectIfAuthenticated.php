<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role->id == User::IS_ADMIN){
                return redirect()->route('adminDashboard');
            }
            else if(Auth::user()->role->id == User::IS_CUSTOMER){
                return redirect()->route('customerDashboard');
                
            } else if(Auth::user()->role->id == User::IS_EMPLOYEE){
                return redirect()->route('employeeDashboard');
            }
            return redirect()->back();
        }

        return $next($request);
    }
}
