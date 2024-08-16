<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('user_role') !== 'admin' || !session()->has('admin')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
