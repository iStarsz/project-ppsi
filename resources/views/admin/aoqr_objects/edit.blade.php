@extends('layouts.admin')

@section('content')
<!-- Sticky Header dengan Judul, Tombol Save, dan Cancel -->
<header class="flex items-center justify-between sticky top-0 z-50 bg-gray-100 py-4 px-20">
    <h1 class="text-3xl font-semibold mb-6">Edit Object</h1>
    <div class="flex space-x-2">
        <!-- Tombol Cancel -->
        <a href="{{ route('admin.aoqr_objects.index') }}"
            class="bg-gray-400 text-white px-4 py-2 rounded-md focus:outline-none">
            Cancel
        </a>

        <!-- Tombol Save -->
        <button type="submit" form="aoqrForm"
            class="bg-[#1b325f] text-white px-4 py-2 rounded-md focus:outline-none">
            Save Changes
        </button>
    </div>
</header>

<div class="container h-screen flex flex-col mx-auto px-4 py-8">

    <form id="aoqrForm" action="{{ route('admin.aoqr_objects.update', $aoqrObject->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Input ID Hidden -->
        <input type="hidden" name="id" value="{{ $aoqrObject->id }}">

        <div class="mb-4">
            <!-- Display existing images -->
            <div class="mb-6">
                <div class="flex gap-4">
                    @foreach(json_decode($aoqrObject->image_url) as $imageUrl)
                    <!-- Image with rounded corners and shadow -->
                    <img src="{{ asset('images/aoqr_objects/' . basename($imageUrl)) }}" alt="Image" class="w-auto h-48 rounded-lg shadow-md">
                    @endforeach
                </div>
            </div>

            <div class="flex mb-6 space-x-2">
                @for ($i = 0; $i < 5; $i++)
                    <div class="relative w-20 h-20 border-dashed border-2 border-gray-400 rounded-md overflow-hidden">
                    <input
                        type="file"
                        name="images[]"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                        accept="image/*"
                        id="image_{{ $i }}"
                        onchange="previewImage(event, {{ $i }})" />
                    <img id="preview_{{ $i }}" class="w-full h-full object-cover" style="display: none;" />
                    <div id="placeholder_{{ $i }}" class="flex items-center justify-center w-full h-full bg-gray-200">
                        <span class="text-sm text-gray-500">Select</span>
                    </div>
            </div>
            @endfor
        </div>


</div>

<!-- Category -->
<div class="mb-4">
    <label for="category_id" class="block text-lg font-medium">Category</label>
    <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        <option value="">Select Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $aoqrObject->category_id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
        @endforeach
    </select>
</div>

<!-- Is Active -->
<div class="mb-4">
    <label for="is_active" class="block text-lg font-medium">Active Status</label>
    <select name="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-md">
        <option value="1" {{ $aoqrObject->is_active == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $aoqrObject->is_active == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

<!-- Name -->
<div class="mb-4">
    <label for="name_object" class="block text-lg font-medium">Nama (Object)</label>
    <input type="text" name="name_object" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $aoqrObject->name_english }}" required>
</div>

<!-- Location -->
<div class="mb-4">
    <label for="location_object" class="block text-lg font-medium">Lokasi (Object)</label>
    <input type="text" name="location_object" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $aoqrObject->location_english }}" required>
</div>

<!-- Description -->
<div class="mb-4">
    <label for="description_object" class="block text-lg font-medium">Deskripsi (Object)</label>
    <textarea name="description_object" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ $aoqrObject->description_english }}</textarea>
</div>

<script>
    function previewImage(event, index) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview_' + index);
            var placeholder = document.getElementById('placeholder_' + index);

            // Hide the placeholder and show the preview image
            placeholder.style.display = 'none';
            output.style.display = 'block';
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection