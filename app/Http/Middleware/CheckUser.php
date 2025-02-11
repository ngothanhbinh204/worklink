<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //  // Nếu user chưa đăng nhập
        //  if (!Auth::check()) {
        //     return response()->json(['message' => 'Bạn cần đăng nhập để thực hiện hành động này'], 401);
        // }

        // // Nếu user có quyền (ví dụ: user nào cũng có thể chặn user khác)
        // if (Auth::user()->role === 'user' || Auth::user()->role === 'admin') {
        //     return $next($request);
        // }

        // return response()->json(['message' => 'Bạn không có quyền thực hiện hành động này'], 403);
        return $next($request);
    }
}