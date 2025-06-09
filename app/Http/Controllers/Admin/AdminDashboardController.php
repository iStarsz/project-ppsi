<?php

namespace App\Http\Controllers\Admin;

use App\Models\AoqrObject;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        // Ambil 5 kategori terbaru
        $categories = \App\Models\Category::latest()->take(5)->get();

        // Ambil 5 objek terbaru
        $aoqrObjectsLatest = \App\Models\AoqrObject::latest()->take(5)->get();

        // Ambil semua objek diurutkan berdasarkan view_count terbanyak
        $aoqrObjectsRanked = \App\Models\AoqrObject::orderBy('view_count', 'desc')->take(5)->get();

        // Return ke view dengan data yang sudah diambil
        return view('admin.dashboard', compact('categories', 'aoqrObjectsLatest', 'aoqrObjectsRanked'));
    }

}
