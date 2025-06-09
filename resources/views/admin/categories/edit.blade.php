@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Edit Category</h1>

    <!-- Form untuk mengupdate kategori -->
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="mb-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium">Category Name</label>
            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">Update Category</button>
    </form>
</div>
@endsection
