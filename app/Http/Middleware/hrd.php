<?php

namespace App\Http\Middleware;

use Closure;

class hrd
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
        if(auth()->user()->posisi == 1){
            return $next($request);
        }
        return 'you are not allowed';
    }
}
