<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

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

        $fetchUserByEmail = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-email?email='.$validated['email']);

        if(array_key_exists('error', $fetchUserByEmail->json())){
            return redirect()->route('login')->withError("Your e-mail address have not been registered");
        }
        else{
            $userId = $fetchUserByEmail->json()['data']['profile']['nip'];
        }
        
        $fetchUserById = Http::get('https://persona-gateway.herokuapp.com/auth/user/get-by-employee-id?id='.$userId);
        $fetchAllUser = Http::withHeaders([
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiYjg4YTkxNjUtOTRmZS00MWE0LWI1YmItODY5OTdhYTllMThhIiwiZW1haWwiOiJockBnbWFpbC5jb20iLCJyb2xlcyI6W3siaWQiOjMsInJvbGUiOiJodW1hbiByZXNvdXJjZSJ9LHsiaWQiOjUsInJvbGUiOiJlbXBsb3llZSJ9XX0sImlhdCI6MTY1MDQ2ODY3OH0.1nFrYhiNA7hzf_Hg09PhVmCji1CaFqnyvPUNCQjpXR0'
        ])->get('https://persona-gateway.herokuapp.com/auth/employee?limit=9999&offset=0&keyword=');
        $dataUser = $fetchAllUser->json();
        
        if (Hash::check($validated['password'], $fetchUserById->json()['data']['User']['password'])) {
            $role = $fetchUserById->json()['data']['Contracts'][0]['Position']['title'];
            session(['user' => ['nip' => $userId,'email' => $fetchUserById->json()['data']['User']['email'], 'password' => $fetchUserById->json()['data']['User']['password'], 'role' => $role, 'data' => $fetchUserById->json()['data']]]);
            session(['allUser' => ['data' => $dataUser]]);
            if(session('user')){
                if($role == 'Finance Staff'){
                    return redirect()->route('findiv.dashboard')->withSuccess('You have successfully logged into finance division portal.');
                }
                elseif($role == 'Finance Director'){
                    return redirect()->route('findir.dashboard')->withSuccess('You have successfully logged into finance director portal.');
                }
                elseif($role == 'Executive Director'){
                    return redirect()->route('exedir.dashboard')->withSuccess('You have successfully logged into executive director portal.');
                }
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
        $request->session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->withSuccess('You have successfully logged out.');
    }
}
