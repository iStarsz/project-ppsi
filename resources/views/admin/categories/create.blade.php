@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Add New Category</h1>

    <!-- Form untuk menambah kategori baru -->
    <form action="{{ route('admin.categories.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium">Category Name</label>
            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="bg-[#1b325f] text-white px-4 py-2 rounded-md focus:outline-none">Add Category</button>
    </form>
</div>
@endsection