<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Signature;

class CheckSignatureFinanceDirector
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
        $signature = Signature::where('user_id', session('user')['nip'])->get();
        if(count($signature) == 0){
            return redirect()->route('findir.dashboard')->withError('Please add your signature to access all pages');
        }
        return $next($request);
    }
}
