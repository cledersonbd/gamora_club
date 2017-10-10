<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\UnauthorizedException;

class AdminMiddleware
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
        $isAdmin = auth()->user()->admin;
        if($isAdmin){
            return $next($request);
        }
        abort(401);
        throw new UnauthorizedException();
    }
}
