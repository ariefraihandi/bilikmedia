<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Jika pengguna sudah login, arahkan ke dashboard
        if (Auth::guard($guard)->check()) {
            // Tampilkan SweetAlert
            Alert::info('You Are Already Logged In', 'You are already logged in. Redirecting to dashboard.');

            // Redirect ke halaman dashboard
            return redirect('/dashboard');
        }

        // Jika belum login, izinkan akses ke halaman
        return $next($request);
    }
}
