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
        if (Auth::check()) {
            if (in_array(Auth::user()->role, $roles)) {

                return $next($request);
            }
            session()->flash('status', 'Bạn không có quyền vào trang này');
            return redirect()->route('dashboard');
        }
        session()->flash('status', 'Cần phải đăng nhập!');
        return redirect()->route('login');
    }
}