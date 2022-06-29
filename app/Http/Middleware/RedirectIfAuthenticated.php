<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(session('user')){            
            if(session('user') && session('user')['role'] == 'Executive Director'){
                return redirect()->route('exedir.dashboard')->withSuccess('You have already logged into executive director portal.');
            }elseif(session('user') && session('user')['role'] == 'Finance Director'){
                return redirect()->route('findir.dashboard')->withSuccess('You have already logged into finance director portal.');
            }elseif(session('user') && session('user')['role'] == 'Finance Staff'){
                return redirect()->route('findiv.dashboard')->withSuccess('You have already logged into finance division portal.');
            }
        }

        return $next($request);
    }
}
