<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah ada session yang menandakan redirect
        if (!Session::has('from_redirect')) {
            return redirect('/jobs'); // Atau ke halaman lain yang diinginkan
        }

        // Hapus session setelah pengecekan agar tidak bisa digunakan ulang
        Session::forget('from_redirect');

        return $next($request);
    }
}
