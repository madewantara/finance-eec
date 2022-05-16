<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MapUserRole;
use App\Models\Role;

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
        if(auth()->user()){
            $user = auth()->user()->userRole()->first()->user_id;
            $userRole = MapUserRole::where('user_id', $user)->first()->role_id;
            $role = Role::where('id', $userRole)->first()->role;
            
            if(auth()->user() && $role == 'executivedirector'){
                return redirect()->route('exedir.dashboard')->withSuccess('You have already logged into executive director portal.');
            }elseif(auth()->user() && $role == 'financedirector'){
                return redirect()->route('findir.dashboard')->withSuccess('You have already logged into finance director portal.');
            }elseif(auth()->user() && $role == 'financedivision'){
                return redirect()->route('findiv.dashboard')->withSuccess('You have already logged into finance director portal.');
            }
        }

        return $next($request);
    }
}
