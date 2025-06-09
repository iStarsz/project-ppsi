@extends('layouts.admin')

@section('content')

<div class="flex">
    <div class="flex-1 p-6">

        <!-- Top Box -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-semibold">Selamat datang di dashboard, admin.</h1>
            <!-- Logout button -->
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-[#1b325f] text-white px-4 py-2 rounded-md">
                    Logout
                </button>
            </form>
        </div>

        <!-- Latest Categories -->
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Latest Categories</h2>
                <ul>
                    @foreach($categories as $category)
                    <li class="mb-4">
                        <p class="font-medium">{{ $category->name }}</p>
                        <p class="text-gray-500 text-sm">Created: {{ $category->created_at ? $category->created_at->format('d/m/Y') : 'N/A' }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Latest Objects (5 Terbaru) -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Latest Objects</h2>
                <ul>
                    @foreach($aoqrObjectsLatest as $object)
                    <li class="mb-4 flex gap-4">
                        @php
                        $images = json_decode($object->image_url);
                        @endphp
                        @if($images && count($images) > 0)
                        <img src="{{ asset('images/aoqr_objects/' . basename($images[0])) }}" alt="Image" class="w-16 h-16 object-cover rounded">
                        @else
                        <p>No Image</p>
                        @endif
                        <div>
                            <p class="font-medium">{{ $object->name_english }}</p>
                            <p class="text-gray-500 text-sm">
                                Created:
                                @if($object->created_at)
                                {{ $object->created_at->format('d/m/Y') }}
                                @else
                                N/A
                                @endif
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Bottom Box: Object View Ranking -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-bold mb-4">Object View Rank</h2>
            <table class="min-w-full border-collapse mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 w-16">Rank</th>
                        <th class="border px-4 py-2 w-[200px]">ID</th>
                        <th class="border px-1 py-2 w-20">Image</th>
                        <th class="border px-4 py-2 w-[300px]">Name</th>
                        <th class="border px-4 py-2 w-[200px]">Views</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aoqrObjectsRanked as $index => $object)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $object->id }}</td>
                        <td class="border px-1 py-2">
                            @php
                            $images = json_decode($object->image_url);
                            @endphp
                            @if($images && count($images) > 0)
                            <img src="{{ asset('images/aoqr_objects/' . basename($images[0])) }}" alt="Object Image" class="w-16 h-16 object-cover rounded">
                            @else
                            <p class="text-center">No Image</p>
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $object->name_english }}</td>
                        <td class="border px-4 py-2 text-center">{{ $object->view_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection