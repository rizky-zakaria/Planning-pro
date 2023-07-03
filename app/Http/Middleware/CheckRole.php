<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Cek kalo sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // inisialisasi variabel user
        $user = Auth::user();

        // Cek role kalau sesuai
        if ($user->role != $roles) {
            return back()->with('Halaman Tidak Ditemukan');
        }

        return $next($request);
    }
}
