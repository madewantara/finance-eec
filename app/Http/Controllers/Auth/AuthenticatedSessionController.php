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
use Alert;

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
        $validated = $request->validated();
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->route('login')->withError("Your e-mail address have not been registered");    
        }

        if(auth()->attempt($validated)){
            $users = auth()->user()->userRole()->first()->user_id;
            $userRole = MapUserRole::where('user_id', $users)->first()->role_id;
            $role = Role::where('id', $userRole)->first()->role;

            if($role == 'financedivision'){
                return redirect()->route('findiv.dashboard')->withSuccess('You have successfully logged into finance division portal.');
            }
            elseif($role == 'financedirector'){
                return redirect()->route('findir.dashboard')->withSuccess('You have successfully logged into finance director portal.');
            }
            elseif($role == 'executivedirector'){
                return redirect()->route('exedir.dashboard')->withSuccess('You have successfully logged into executive director portal.');
            }
        }
        else{
            return redirect()->route('login')->withError('Your email address or password are wrong');
        }
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

        return redirect('/login')->withSuccess('You have successfully logged out.');
    }
}
