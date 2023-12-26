<?php

namespace DDD\Infrastructure\Core\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Auth
{
    public function handle(Request $request, Closure $next)
    {
        if (!isset(session('adminUser')) || !isset(session('adminPass'))) {
            return redirect()->intended('admin/login')->with('fail', 'Đăng nhập mới được vào');
        }
        logger('[middleware] auth');
        return $next($request);
    }
}
