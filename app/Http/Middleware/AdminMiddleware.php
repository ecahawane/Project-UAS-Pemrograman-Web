<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah user sudah login
        if (!auth()->check()) {

            return redirect('/login');

        }

        // cek apakah role bukan admin
        if (auth()->user()->role != 'admin') {

            abort(403, 'AKSES DITOLAK');

        }

        return $next($request);
    }
}