<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'seller') {
            return $next($request);
        }

        return redirect('/'); // Jika bukan penjual, arahkan ke halaman beranda atau halaman lain yang sesuai.
    }
}
