<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRegistrationCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_active == 1) {
            return $next($request);

        }
        if (Auth::check() && Auth::user()->registration_step == 1) {
            return redirect(route('register-step-2'));
        }
        if (Auth::check() && Auth::user()->registration_step == 2) {
            return redirect(route('register-step-3'));
        }

//        auth()->user()->registration_step;
//        if (auth()->user()->registration_step == 1) {
//            return route('register-step-2');
//            die('ok');
//        }
//        if (auth()->user()->registration_step == 2) {
//            return view('auth.register-step-2');
//        }
        return $next($request);
    }
}
