@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">

    <a href="{{ route('admin.aoqr_objects.create') }}" class="bg-[#1b325f] text-white px-4 py-2 rounded-md focus:outline-none mb-5">Create New Object</a>

    <!-- Search Bar -->
    <input type="text" id="searchInput" placeholder="Search by Name..." class="w-full p-2 border border-gray-300 rounded my-5">

    <!-- Filter Kategori -->
    <select id="categoryFilter" class="w-full p-2 border border-gray-300 rounded mb-5">
        <option value="">All Categories</option>
        @foreach($categories as $category)
        <option value="{{ strtolower($category) }}">{{ $category }}</option>
        @endforeach
    </select>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10" id="aoqrContainer">
        @foreach($aoqrObjects as $object)
        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 aoqr-item"
            data-name="{{ strtolower($object->name_object) }}"
            data-category="{{ strtolower($object->category->name ?? '') }}">

            <!-- Image URL -->
            <div class="mb-6">
                @php
                $images = json_decode($object->image_url);
                @endphp
                @if($images && count($images) > 0)
                <img src="{{ asset('images/aoqr_objects/' . basename($images[0])) }}" alt="Image" class="w-full h-auto object-cover rounded-lg shadow-md aspect-[16/9]">
                @endif
            </div>

            <p class="text-sm mb-4">#{{ $object->id }}</p>
            <p class="text-sm mb-4">{{ $object->category->name ?? 'No Category' }}</p>
            <h3 class="text-xl font-semibold mb-4">{{ $object->name_object }}</h3>

            <div class="flex justify-between">
                <a href="{{ route('admin.aoqr_objects.show', $object->id) }}" class="bg-gray-200 text-green-500 px-3 py-1 rounded-md hover:bg-gray-200">View</a>
                <a href="{{ route('admin.aoqr_objects.edit', $object->id) }}" class="bg-gray-200 text-yellow-500 px-3 py-1 rounded-md hover:bg-gray-200">Edit</a>
                <a href="{{ route('admin.aoqr_objects.view_qrcode', $object->id) }}" class="bg-gray-200 text-purple-500 px-3 py-1 rounded-md hover:bg-gray-200">QR Code</a>
                <form action="{{ route('admin.aoqr_objects.destroy', $object->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this Object?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-200 text-red-500 px-3 py-1 rounded-md hover:bg-gray-200">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const items = document.querySelectorAll('.aoqr-item');

    function filterItems() {
        const filter = searchInput.value.toLowerCase();
        const category = categoryFilter.value;

        items.forEach(item => {
            const name = item.dataset.name;
            const itemCategory = item.dataset.category;
            const regex = new RegExp(filter.split('').join('.*'), 'i');
            const matchesName = regex.test(name);
            const matchesCategory = category === '' || itemCategory === category;

            item.style.display = matchesName && matchesCategory ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterItems);
    categoryFilter.addEventListener('change', filterItems);
</script>
@endsection








{{-- @extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">

    <a href="{{ route('admin.aoqr_objects.create') }}" class="bg-[#1b325f] text-white px-4 py-2 rounded-md focus:outline-none mb-5">Create New Aoqr Object</a>

<!-- Search Bar -->
<input type="text" id="searchInput" placeholder="Search..." class="w-full p-2 border border-gray-300 rounded my-5">

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10" id="aoqrContainer">
    @foreach($aoqrObjects as $object)
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 aoqr-item" data-name="{{ strtolower($object->name_english) }}">

        <!-- Image URL -->
        <div class="mb-6">
            <div class="flex gap-4">
                @php
                $images = json_decode($object->image_url);
                @endphp
                @if($images && count($images) > 0)
                <img src="{{ asset('images/aoqr_objects/' . basename($images[0])) }}" alt="Image" class="w-full h-auto object-cover rounded-lg shadow-md aspect-[16/9]">
                @endif
            </div>
        </div>

        <p class="text-sm mb-4">#{{ $object->id }}</p>
        <p class="text-sm mb-4">{{ $object->category->name }}</p>
        <h3 class="text-xl font-semibold mb-4">{{ $object->name_object }}</h3>

        <div class="flex justify-between">
            <a href="{{ route('admin.aoqr_objects.show', $object->id) }}" class="bg-gray-200 text-green-500 px-3 py-1 rounded-md hover:bg-gray-200">View</a>
            <a href="{{ route('admin.aoqr_objects.edit', $object->id) }}" class="bg-gray-200 text-yellow-500 px-3 py-1 rounded-md hover:bg-gray-200">Edit</a>
            <a href="{{ route('admin.aoqr_objects.view_qrcode', $object->id) }}" class="bg-gray-200 text-purple-500 px-3 py-1 rounded-md hover:bg-gray-200">QR Code</a>
            <form action="{{ route('admin.aoqr_objects.destroy', $object->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this Object?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-200 text-red-500 px-3 py-1 rounded-md hover:bg-gray-200">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let items = document.querySelectorAll('.aoqr-item');

        items.forEach(item => {
            let name = item.dataset.name;
            let regex = new RegExp(filter.split('').join('.*'), 'i'); // Logika like dengan mendekati huruf yang ada
            item.style.display = regex.test(name) ? '' : 'none';
        });
    });
</script>
@endsection --}}








{{-- @extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">

    <a href="{{ route('admin.aoqr_objects.create') }}" class="bg-[#1b325f] text-white px-4 py-2 rounded-md focus:outline-none mb-5">Create New Aoqr Object</a>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
    @foreach($aoqrObjects as $object)
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">

        <!-- Image URL -->
        <div class="mb-6">
            <div class="flex gap-4">
                @php
                $images = json_decode($object->image_url);
                @endphp
                @if($images && count($images) > 0)
                <!-- Display the first image -->
                <img src="{{ asset('images/aoqr_objects/' . basename($images[0])) }}" alt="Image" class="w-full h-auto object-cover rounded-lg shadow-md aspect-[16/9]">
                @endif
            </div>
        </div>

        <p class="text-sm mb-4">#{{ $object->id }}</p>
        <h3 class="text-xl font-semibold mb-4">{{ $object->name_english }}</h3>

        <div class="flex justify-between">
            <a href="{{ route('admin.aoqr_objects.show', $object->id) }}" class="bg-gray-200 text-green-500 px-3 py-1 rounded-md hover:bg-gray-200">View</a>
            <a href="{{ route('admin.aoqr_objects.edit', $object->id) }}" class="bg-gray-200 text-yellow-500 px-3 py-1 rounded-md hover:bg-gray-200">Edit</a>
            <a href="{{ route('admin.aoqr_objects.view_qrcode', $object->id) }}" class="bg-gray-200 text-purple-500 px-3 py-1 rounded-md hover:bg-gray-200">QR Code</a>
            <form action="{{ route('admin.aoqr_objects.destroy', $object->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this AoqrObject?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-200 text-red-500 px-3 py-1 rounded-md hover:bg-gray-200">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection --}}