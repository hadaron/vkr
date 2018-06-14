<?php

namespace App\Http\Middleware;

use Closure;

class isClient
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
        if (auth()->user()->isClient()) {
            return $next($request);
        }
        else {
            return redirect('/');
        }
    }
}
