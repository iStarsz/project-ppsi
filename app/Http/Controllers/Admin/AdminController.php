<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    // Menampilkan dashboard admin setelah login
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();  // Logout dari guard admin
        return redirect()->route('admin.login');  // Redirect ke halaman login
    }
}
