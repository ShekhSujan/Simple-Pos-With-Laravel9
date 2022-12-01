<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->status == 0)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toastr::error('Your Account is suspended, please contact Admin', 'Danger');
            return redirect()->route('login');
        }
        if (Auth::guard('company')->check() && (Auth::guard('company')->user()->status == 0)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toastr::error('Your Account is suspended, please contact Admin', 'Danger');
            return redirect()->route('company_login');
        }
        return $next($request);
    }
}
