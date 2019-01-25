<?php

namespace AeroLinkWeb\Http\Middleware;

use Closure;
use CusAuth;

class CAMID
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
        if(!CusAuth::user()) {
            return redirect('Applicant/login');
        }

        return $next($request);
    }
}
