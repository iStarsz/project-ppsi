<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    // Fungsi untuk menampilkan semua kategori
    public function index()
    {
        $categories = Category::all();
        $categories = Category::orderBy('name', 'asc')->get();  // Ambil semua data kategori
        return view('admin.categories.index', compact('categories'));  // Pass data ke view
    }

    // Fungsi untuk menampilkan form untuk menambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // Fungsi untuk menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Menyimpan kategori baru
        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    // Fungsi untuk menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Fungsi untuk mengupdate kategori
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Mencari kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Mengupdate kategori
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    // Fungsi untuk menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Menghapus kategori
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}

