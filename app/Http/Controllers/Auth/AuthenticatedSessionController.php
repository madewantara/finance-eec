<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\MapUserRole;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('authentication.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();

        $validated = $request->validated();
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('login')->with('message', "Your E-mail Address Hasn't Been Registered");
        }

        if(auth()->attempt($validated)){
            $users = auth()->user()->userRole()->first()->user_id;
            $userRole = MapUserRole::where('user_id', $users)->first()->role_id;
            $role = Role::where('id', $userRole)->first()->role;

            if($role == 'financedivision'){
                return redirect()->route('findiv.dashboard');
                // return view('test1');
            }
            elseif($role == 'financedirector'){
                return view('test2');
            }
            elseif($role == 'executivedirector'){
                return view('test3');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Your Email Address or Password Are Wrong');
        }

        // $request->session()->regenerate();
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
