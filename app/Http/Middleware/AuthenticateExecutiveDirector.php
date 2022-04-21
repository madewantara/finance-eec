<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\MapUserRole;
use App\Models\Role;

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
        if(empty(auth()->user())){
            return redirect()->route('login')->with('error', 'Your session has expired! Please login to your account.');
        }
        
        $user = auth()->user()->userRole()->first()->user_id;
        $userRole = MapUserRole::where('user_id', $user)->first()->role_id;
        $role = Role::where('id', $userRole)->first()->role;

        if(auth()->user() && $role == 'executivedirector'){
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'You do not have executive director access');
    }
}
