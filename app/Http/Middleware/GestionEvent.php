<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestionEvent
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

        return $next($request);
    }
    protected function GestionEvent($request)
    {
        // something like
        return ($request->user()->role==5)||($request->user()->role ==4)||($request->user()->role ==1)||($request->user()->role ==2 )||($request->user()->role ==3);
    }
}
