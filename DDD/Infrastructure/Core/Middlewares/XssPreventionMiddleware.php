<?php

namespace DDD\Infrastructure\Core\Middlewares;

use Closure;
use Illuminate\Http\Request;

class XssPreventionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        logger('[middleware] XssPreventionMiddleware');

        return $next($request);
    }
}
