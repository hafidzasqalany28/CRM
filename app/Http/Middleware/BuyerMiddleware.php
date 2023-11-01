<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BuyerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'buyer') {
            return $next($request);
        }

        return redirect('/'); // Jika bukan pembeli, arahkan ke halaman beranda atau halaman lain yang sesuai.
    }
}
