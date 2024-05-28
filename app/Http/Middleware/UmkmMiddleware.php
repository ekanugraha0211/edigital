<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'umkm') {
            // Redirect ke halaman yang sesuai jika pengguna tidak memiliki peran admin
            return redirect()->route('not_allowed');
        }

        return $next($request);
    }
}
