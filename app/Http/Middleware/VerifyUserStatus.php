<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! auth()->user()->is_active) {
            auth()->guard()->logout();
            $request->session()->invalidate();

            return redirect()->route('login')->with('deactivated_msg', 'Your account has been deactivated!');
        }

        return $next($request);
    }
}
