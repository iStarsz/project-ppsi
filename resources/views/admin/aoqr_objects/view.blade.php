@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">View Object</h1>

    <!-- Image URL -->
    <div class="mb-6">
        <div class="flex flex-wrap gap-4">
            @foreach(json_decode($aoqrObject->image_url) as $imageUrl)
            <!-- Image with rounded corners and shadow -->
            <img src="{{ asset('images/aoqr_objects/' . basename($imageUrl)) }}" alt="Image" class="w-auto h-48 rounded-lg shadow-md">
            @endforeach
        </div>
    </div>

    <!-- Name and Category -->
    <div class="mb-6">
        <strong class="text-lg font-medium text-gray-700">Nama (Object):</strong>
        <p class="text-gray-800">{{ $aoqrObject->name_object }}</p>
    </div>
    <div class="mb-6">
        <strong class="text-lg font-medium text-gray-700">Category:</strong>
        <p class="text-gray-800">{{ $aoqrObject->category ? $aoqrObject->category->name : 'N/A' }}</p>
    </div>

    <!-- Location (English) -->
    <div class="mb-6">
        <strong class="text-lg font-medium text-gray-700">Lokasi (Object):</strong>
        <p class="text-gray-800">{{ $aoqrObject->location_object }}</p>
    </div>

    <!-- Description (English) -->
    <div class="mb-6">
        <strong class="text-lg font-medium text-gray-700">Deskripsi (Object):</strong>
        <p class="text-gray-800">{!! nl2br(e($aoqrObject->description_object)) !!}</p>
    </div>





    <!-- Active Status -->
    <div class="mb-6">
        <strong class="text-lg font-medium text-gray-700">Active Status:</strong>
        <p class="text-gray-800">{{ $aoqrObject->is_active ? 'Active' : 'Inactive' }}</p>
    </div>

    <!-- Edit Button -->
    <div class="mt-6">
        <a href="{{ route('admin.aoqr_objects.edit', $aoqrObject->id) }}" class="bg-yellow-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-yellow-600 transition duration-300">Edit</a>
    </div>
</div>
@endsection