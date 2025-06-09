<?php

// app/Http/Middleware/AdminAuthenticate.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan middleware hanya bekerja di route admin
        if ($request->is('admin/*')) {
            // Jika belum login, redirect ke halaman login admin
            if (!Auth::guard('admin')->check() && !$request->is('admin/login')) {
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}

