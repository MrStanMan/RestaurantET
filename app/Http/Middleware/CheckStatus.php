<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        if ($request->user()->status == '1') {
            Auth::logout();
            return redirect()->to('/')->with('error', 'Uw sessie is verlopen omdat uw account geblokkeerd is.');
        }
            return $next($request);
    }
}
