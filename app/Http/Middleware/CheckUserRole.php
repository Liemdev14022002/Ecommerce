<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Kiểm tra nếu người dùng đã được xác thực và vai trò của họ khớp với vai trò yêu cầu
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Chuyển hướng về trang chủ nếu người dùng không có vai trò yêu cầu
        return redirect('/');
    }
}
