<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KonsumenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'konsumen') {
            return $next($request);
        }

        return redirect('/login')->withErrors('Anda tidak memiliki akun.');
    }
}