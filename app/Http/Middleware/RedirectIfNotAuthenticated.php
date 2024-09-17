<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Jika pengguna belum login
        if (!Auth::check()) {
            // Menampilkan SweetAlert untuk memberi tahu pengguna bahwa mereka harus login
            Alert::error('Unauthorized', 'You need to login to access this page.');
            
            // Redirect ke halaman login dan simpan URL tujuan
            return redirect()->guest(route('showLoginForm'));
        }

        // Jika pengguna sudah login, lanjutkan request
        return $next($request);
    }
}
