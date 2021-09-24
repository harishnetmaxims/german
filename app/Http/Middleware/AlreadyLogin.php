<?php

namespace App\Http\Middleware;

use Closure;

class AlreadyLogin
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
        if((Session()->has('LOGIN_SUC')) && (url('webadmin') == $request->url())) {
            return back();
        }

        return $next($request);
    }
}
