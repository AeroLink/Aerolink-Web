<?php

namespace AeroLinkWeb\Http\Middleware;

use Closure;
use CusAuth;

class VENDORMID
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
        if(!CusAuth::VendorUser()) {
            return redirect('/Vendors');
        }
        
        return $next($request);
    }
}
