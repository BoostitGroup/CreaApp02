<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestionCmpAdher
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
        if (!$this->GestionCmpAdher($request)) {

            return response('Unauthorized.', 404);

       }
        return $next($request);
    }
    protected function GestionCmpAdher($request)
    {
        // something like
        return ($request->user()->role==4)||($request->user()->role==2)||($request->user()->role==3);
    }
}
