<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UmkmMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'umkm') {
            return $next($request);
        }

        return redirect('/login')->withErrors('Anda tidak memiliki akses admin.');
    }
}
