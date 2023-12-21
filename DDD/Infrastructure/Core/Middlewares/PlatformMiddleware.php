<?php

namespace DDD\Infrastructure\Core\Middlewares;

use Closure;
use Illuminate\Http\Request;

class PlatformMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        logger('[middleware] PlatformMiddleware');
        return $next($request);
    }
}
