@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Manage Categories</h1>

    <!-- Tampilkan pesan success -->
    @if(session('success'))
    <div class="bg-green-100 bg-opacity-80 text-green-500 p-4 rounded-md mb-6">
        {{ session('success') }}
    </div>
    @endif

    <!-- Link untuk menambah kategori baru -->
    <a href="{{ route('admin.categories.create') }}" class="bg-[#1b325f] text-white px-4 py-2 rounded-md mb-6 inline-block">Add Category</a>

    <!-- Daftar kategori -->
    <h2 class="text-2xl font-semibold mb-4">Categories List</h2>
    <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Category Name</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $category->id }}</td>
                <td class="px-4 py-2">{{ $category->name }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <!-- Edit Category -->
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-gray-200 text-yellow-600 px-3 py-1 rounded-md">Edit</a>

                    <!-- Delete Category -->
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-200 text-red-500 px-3 py-1 rounded-md">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection