<?php

namespace App\Http\Middleware;

use Closure;

class OtentikasiUser
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(session()->has('authenticated')) {
            return $next($request);    
        } else {
            // return response('Unauthorized.', 401);
            return redirect()->guest('/');
        }
    }
}