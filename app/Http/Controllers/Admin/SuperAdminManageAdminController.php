<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class SuperAdminManageAdminController extends Controller
{
    // Tampilkan semua admin
    public function index()
    {
        $admins = Admin::all(); // Ambil semua admin

        // Cek apakah yang login adalah super admin
        $loggedInAdmin = Auth::guard('admin')->user(); // Ambil admin yang sedang login
        $isSuperAdmin = $loggedInAdmin ? $loggedInAdmin->isSuperAdmin : false;

        return view('admin.manage_admins.index', compact('admins', 'isSuperAdmin'));
    }
    

    // Form tambah admin
    public function create()
    {
        return view('admin.manage_admins.create');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isSuperAdmin' => false, // Admin baru tidak bisa jadi super admin
        ]);

        return redirect()->route('admin.manage-admins.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.manage_admins.edit', compact('admin'));
    }

    // Update data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6', // Password opsional
        ]);

        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.manage-admins.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Hapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->isSuperAdmin) {
            return redirect()->route('admin.manage-admins.index')->with('error', 'Super admin tidak bisa dihapus.');
        }

        $admin->delete();

        return redirect()->route('admin.manage-admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
