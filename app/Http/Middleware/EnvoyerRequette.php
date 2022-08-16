<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnvoyerRequette
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
        if (!$this->EnvoyerRequette($request)) {

            return response('Unauthorized.', 404);

       }
        return $next($request);
    }
    protected function EnvoyerRequette($request)
    {
        // something like
        return ($request->user()->role==1);
    }
}
