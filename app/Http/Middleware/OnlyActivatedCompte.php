<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyActivatedCompte
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

        if (!$this->isActive($request)) {

             return response('Unauthorized.', 401);
          
        }
        return $next($request);
    }


    protected function isActive($request)
    {
      

        // something like
        return ($request->user()->role != 8);
    }
}
