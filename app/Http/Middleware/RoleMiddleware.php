<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Bạn không có quyền truy cập!'], 403);
        }

        // Nếu có quyền admin hoặc super-admin, cho phép
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }

        // Nếu không có quyền admin, kiểm tra xem có phải chính user đó không
        $userId = $request->route('id'); // Lấy ID từ route
        if ($userId && $user->id == $userId) {
            return $next($request);
        }
        return $next($request);
    }
}
