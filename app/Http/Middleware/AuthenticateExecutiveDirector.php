<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateExecutiveDirector
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
        if(!session('user')){
            return redirect()->route('login')->withError('Your session has expired! Please login to your account.');
        }

        if(session('user')['role'] == 'Executive Director'){
            return $next($request);
        }

        return redirect()->back()->withError('You do not have executive director access');
    }
}
