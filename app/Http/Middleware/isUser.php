<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna adalah admin (contoh: dengan memeriksa peran 'admin')
        if (auth()->check() && auth()->user()->isUser()) {
            return $next($request);
        }

        // Jika pengguna bukan admin, mungkin Anda ingin mengarahkannya atau memberikan pesan akses ditolak
        return redirect('/home')->with('error', 'Akses ditolak.');
    }
}
