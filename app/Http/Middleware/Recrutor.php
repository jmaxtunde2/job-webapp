<?php

namespace App\Http\Middleware;

use Closure;

class Recrutor
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
        if ($request->user() && $request->user()->level != 6034)
        {
            return redirect()->route(getLevel($request->user()->level).'.dashboard');
        }
        return $next($request);
    }
}
